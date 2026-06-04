<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HalamanAdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_akses_dashboard()
    {
        $user = User::where('level', 'Admin')->first();
        
        $response = $this->actingAs($user)->get('/quiz/dashboard');

        $response->assertStatus(200);
    }

    // akses halaman rekap
    public function test_akses_rekap()
    {
        $user = User::where('level', 'Admin')->first();

        $response = $this->actingAs($user)->get('/report/rekap');

        $response->assertStatus(200);
    }


    // akses halaman generate user
    public function test_akses_generate_user()
    {
        $user = User::where('level', 'Admin')->first();

        $response = $this->actingAs($user)->get('/generate-user');

        $response->assertStatus(200);
    }

    // halaman users dengan parameter level=User atau Admin
    public function test_halaman_users()
    {
        $user = User::where('level', 'Admin')->first();

        $response = $this->actingAs($user)->get('/users?level=Admin');

        $response->assertStatus(200);
    }

    // akses halaman report/rekap-biodata
    public function test_akses_rekap_biodata()
    {
        $user = User::where('level', 'Admin')->first();

        $response = $this->actingAs($user)->get('/report/rekap-biodata');

        $response->assertStatus(200);
    }


}
