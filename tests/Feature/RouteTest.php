<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * @group integration-route-1
     *
     * @return void
     */
    public function test_get_response_home_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @group integration-route
     *
     * @return void
     */
    public function test_get_api_response()
    {
        $response = $this->get('api/');

        $response->assertStatus(404);
    }

    /**
     * @group integration-route
     *
     * @return void
     */
    public function test_get_api_json_structure()
    {
        $response = $this->get('api/');

        $response->assertJsonStructure(['error']);
    }
}
