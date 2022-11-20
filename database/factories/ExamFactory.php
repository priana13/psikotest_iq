<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExamFactory extends Factory
{
    protected $model = Exam::class;

    public function definition()
    {
        return [
            'type' => 'cerdas',
			'nama_tes' => $this->faker->sentence,
			'waktu' => 60,
			'nilai_min' => 80,
			'peraturan' => $this->faker->text,
        ];
    }
}
