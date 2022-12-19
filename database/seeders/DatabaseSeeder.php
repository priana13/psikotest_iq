<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Setting;
use App\Models\StaticPage;
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
        
        // create admin
        User::create([
            'name' => 'Hari',
            'email' => 'arstaharsana@gmail.com',
            'level' => "Admin",
            'password' => '$2y$10$jWlaSaI6aahhPrxFxMdqiulEpfbX4JyNTiqDvGKUVuazc2LOwH3A6'
        ]);     


        \App\Models\User::factory(8)->create();
        \App\Models\Exam::factory(2)->create();
        \App\Models\Package::factory(1)->create();

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


        $static_pages = [
            "tentang",
            "kontak",
            "syarat_ketentuan",
            "kebijakan"
        ];

        foreach ($static_pages as $value) {
           StaticPage::create([
            'name' => $value
           ]);
        }

        $categories = ["Statis", "Artikel"];

        foreach ($categories as $category) {

            Category::create([
                "slug" => strtolower($category),
                "category" => $category
            ]);
        }

        // setting 

        $setting = [
            "app_name" => "Arsta Media",
            "app_bio" => "Merupakan penyedia pembelajaran dan pelatihan berbasis digital yang bersifat personal.",
            "twitter" => null,
            "facebook" => null,
            "instagram" => null
        ];

        foreach ($setting as $key => $value) {

            Setting::create([
                "name" => $key,
                "value" => $value
            ]);
        }





    }
}
