<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create admin
        User::create([
			'name' => 'Admin',
			'email' => 'herian.sap@gmail.com',
			'level' => "Admin",
            'password' => Hash::make("bismillah")
        ]);        


        \App\Models\User::factory(10)->create();
        \App\Models\Exam::factory(2)->create();
        // \App\Models\Question::factory(10)->create();

        for ($i=1; $i <= 50; $i++) {

          $faker = Faker::create();

           Question::create([
			'exam_id' => 1,
			'soal' => $faker->sentence(6),
			'no' => $i,
			'a' => $faker->sentence(2),
			'b' => $faker->sentence(3),
			'c' => $faker->sentence(4),
			'd' => $faker->sentence(3),
			'e' => $faker->sentence(5),
			'kc_jawaban' => "b",
			'gambar' => $faker->sentence(2),
			'status' => 'Aktif',
        ]);

        }



    }
}
