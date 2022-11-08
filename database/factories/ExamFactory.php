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
			'nama_tes' => $this->faker->name,
			'waktu' => $this->faker->name,
			'nilai_min' => $this->faker->name,
			'peraturan' => $this->faker->name,
        ];
    }
}
