<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HalamanProfile extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_halaman_profile()
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/myprofile');

        $response->assertStatus(200);
    }
}
