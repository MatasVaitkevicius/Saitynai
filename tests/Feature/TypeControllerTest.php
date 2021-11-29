<?php

namespace Tests\Feature;

use Tests\Helpers\MigrateFreshSeed;
use Tests\TestCase;

class TypeControllerTest extends TestCase
{
    use MigrateFreshSeed;

    /**
     * Test Existing User Payload
     */
    private const TEST_EXISTING_USER_PAYLOAD = [
        'name' => 'user',
        'email' => 'user@gmail.com',
        'password' => 'password123',
    ];

    public function getAccessToken() {
        $response = $this->post('api/login', self::TEST_EXISTING_USER_PAYLOAD);
        $content = json_decode($response->getContent(), true);

        return $content['access_token'];
    }

    /**
     * Test Type Payload
     */
    private const TEST_TYPE_PAYLOAD = [
        'name' => 'test type',
    ];

    /**
     * @group integration-type
     *
     * @return void
     */
    public function test_get_types_status()
    {
        $response = $this->get('api/types', ['Authorization' => 'Bearer ' . $this->getAccessToken()]);

        $response->assertStatus(200);
    }

    /**
     * @group integration-type
     *
     * @return void
     */
    public function test_get_types_json_structure()
    {
        $response = $this->get('api/types', ['Authorization' => 'Bearer ' . $this->getAccessToken()]);

        $response->assertJsonStructure([
            [
                "id",
                "name",
                "created_at",
                "updated_at",
            ]]);
    }

    /**
     * @group integration-type
     *
     * @return void
     */
    public function test_post_type_status()
    {
        $response = $this->post('api/types', self::TEST_TYPE_PAYLOAD, ['Authorization' => 'Bearer ' . $this->getAccessToken()]);

        $response->assertStatus(201);
    }

    /**
     * @group integration-type
     *
     * @return void
     */
    public function test_get_type_status()
    {
        $response = $this->get('api/types/1', ['Authorization' => 'Bearer ' . $this->getAccessToken()]);

        $response->assertStatus(200);
    }

    /**
     * @group integration-type
     *
     * @return void
     */
    public function test_delete_type_status()
    {
        $response = $this->delete('api/types/1', [], ['Authorization' => 'Bearer ' . $this->getAccessToken()]);

        $response->assertStatus(204);
    }

    /**
     * @group integration-type
     *
     * @return void
     */
    public function test_get_type_response_body()
    {
        $expectedResponse = [
                "id" => 1,
                "name" => "Type 1",
                "created_at" => null,
                "updated_at" => null
        ];

        $response = $this->get('api/types/1', ['Authorization' => 'Bearer ' . $this->getAccessToken()]);

        $actualResponse = json_decode($response->getContent(), true);

        $this->assertEquals($expectedResponse, $actualResponse);
    }

    /**
     * @group integration-type
     *
     * @return void
     */
    public function test_update_type_status()
    {
        $updatePayload = [
            "name" => "update name",
        ];

        $response = $this->put('api/types/1', $updatePayload, ['Authorization' => 'Bearer ' . $this->getAccessToken()]);

        $response->assertStatus(200);
    }
}
