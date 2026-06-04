<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_home_redirect_to_login()
    {
        $response = $this->get('/');

        $response->assertStatus(302);

        $response->assertRedirect('/login');
    }


}
