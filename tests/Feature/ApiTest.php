<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test()
    {
        $response = $this->getJson('/desk_api');

        $response->assertStatus(200);
    }
}
