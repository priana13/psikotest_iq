<?php

namespace Database\Seeders;

use App\Models\Examcategory;
use Illuminate\Database\Seeder;

class ExamCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category = [            
            [
                "name" => "Kepribadian",
                "type" => "PG",
                "exam_type" => "Psikotes"
            ],
            [
                "name" => "Kecerdasan",
                "type" => "PG",
                "exam_type" => "Psikotes"
            ],
            [
                "name" => "Sikap Kerja",
                "type" => "Column",
                "exam_type" => "Psikotes"
            ],
            [
                "name" => "Pengetahuan Umum",
                "type" => "PG",
                "exam_type" => "Akademik"
            ],
            [
                "name" => "Bahasa Indonesia",
                "type" => "PG",
                "exam_type" => "Akademik"
            ],
            [
                "name" => "Bahasa Inggris",
                "type" => "PG",
                "exam_type" => "Akademik"
            ],
            
        ];          

     

        foreach($category as $row){

            Examcategory::create([
                "name" => $row['name'],
                'type' => $row['type'],
                'exam_type' => $row['exam_type']
            ]);

        }


    }
}
