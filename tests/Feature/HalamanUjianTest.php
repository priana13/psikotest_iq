<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HalamanUjianTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_halaman_welcome_test()
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/iq/welcome');

        $response->assertStatus(200);
    }


    public function test_halaman_biodata_test()
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/iq/biodata');

        $response->assertStatus(200);
    }


    public function test_halaman_petunjuk_test()
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/iq/petunjuk');

        $response->assertStatus(200);
    }

    public function test_halaman_test()
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/test');

        $response->assertStatus(200);
    }


}
