<?php

namespace Tests\Feature;

use Tests\Helpers\MigrateFreshSeed;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use MigrateFreshSeed;

    /**
     * Test User Payload
     */
    private const TEST_USER_PAYLOAD = [
        'name' => 'testUser',
        'email' => 'testUser@gmail.com',
        'password' => 'passwordtest123',
        'role' => 'user',
    ];

    /**
     * Test Existing User Payload
     */
    private const TEST_EXISTING_USER_PAYLOAD = [
        'name' => 'user',
        'email' => 'user@gmail.com',
        'password' => 'password123',
    ];


    /**
     * Test Existing User Payload
     */
    private const TEST_LOGIN_SUCCESS = [
        'name' => 'user',
        'email' => 'user@gmail.com',
        'password' => 'password123',
    ];

    /**
     * Test User Payload
     */
    private const TEST_USER_PAYLOAD_MALFORMED = [
        'email' => 'wrongemail',
        'password' => 'www',
    ];

    public function getAccessToken() {
        $response = $this->post('api/login', self::TEST_EXISTING_USER_PAYLOAD);
        $content = json_decode($response->getContent(), true);

        return $content['access_token'];
    }

    /**
     * @group integration-auth
     *
     * @return void
     */
    public function test_register_status()
    {
        $response = $this->post('api/register', self::TEST_USER_PAYLOAD);

        $response->assertStatus(201);
    }

    /**
     * @group integration-auth
     *
     * @return void
     */
    public function test_register_malformed_status()
    {
        $response = $this->post('api/register', self::TEST_USER_PAYLOAD_MALFORMED);

        $response->assertStatus(400);
    }

    /**
     * @group integration-auth
     *
     * @return void
     */
    public function test_login_status()
    {
        $response = $this->post('api/login', self::TEST_EXISTING_USER_PAYLOAD);

        $response->assertStatus(200);
    }

    /**
     * @group integration-auth
     *
     * @return void
     */
    public function test_login_status_malformed()
    {
        $response = $this->post('api/login', self::TEST_USER_PAYLOAD);

        $response->assertStatus(401);
    }

    /**
     * @group integration-auth
     *
     * @return void
     */
    public function test_login_response_json_structure()
    {
        $response = $this->post('api/login', self::TEST_EXISTING_USER_PAYLOAD);

        $response->assertJsonStructure([
            "access_token",
            "token_type",
            "expires_in",
            "user" => [
                "id",
                "name",
                "email",
                "role",
                "created_at",
                "updated_at"
            ]
        ]);
    }

    /**
     * @group integration-auth
     *
     * @return void
     */
    public function test_user_profile_status()
    {
        $response = $this->get('api/user-profile', ['Authorization' => 'Bearer ' . $this->getAccessToken()]);

        $response->assertStatus(200);
    }

    /**
     * @group integration-auth
     *
     * @return void
     */
    public function test_profile_profile_json_structure()
    {
        $response = $this->get('api/user-profile', ['Authorization' => 'Bearer ' . $this->getAccessToken()]);

        $response->assertJsonStructure([
            "id",
            "name",
            "email",
            "role",
            "created_at",
            "updated_at",
        ]);
    }

    /**
     * @group integration-auth
     *
     * @return void
     */
    public function test_user_profile_response_body()
    {
        $expectedResponse = [
            "id" => 2,
            "name" => "user",
            "email" => "user@gmail.com",
            "role" => "user",
            "created_at" => null,
            "updated_at" => null
        ];

        $response = $this->get('api/user-profile', ['Authorization' => 'Bearer ' . $this->getAccessToken()]);

        $actualResponse = json_decode($response->getContent(), true);

        $this->assertEquals($expectedResponse, $actualResponse);
    }
}
