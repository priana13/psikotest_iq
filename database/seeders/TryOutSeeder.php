<?php

namespace Database\Seeders;

use App\Models\TryOut;
use App\Models\TryoutExam;
use Illuminate\Database\Seeder;

class TryOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $exams = [
            "Kecerdasan" => 23,
            "Kepribadian" => 27,
            "Sikap Kerja" => 39
        ];

        foreach ($exams as $key => $value) {
            
            TryoutExam::create([
                'name' => $key,
                'exam_id' => $value
            ]);

        }




    }
}
