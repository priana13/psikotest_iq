<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition()
    {
        return [
			'exam_id' => $this->faker->name,
			'soal' => $this->faker->name,
			'a' => $this->faker->name,
			'b' => $this->faker->name,
			'c' => $this->faker->name,
			'd' => $this->faker->name,
			'e' => $this->faker->name,
			'kc_jawaban' => $this->faker->name,
			'gambar' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
