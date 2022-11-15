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
			'exam_id' => 1,
			'soal' => $this->faker->text(10),
			'no' => 1,
			'a' => $this->faker->name,
			'b' => $this->faker->name,
			'c' => $this->faker->name,
			'd' => $this->faker->name,
			'e' => $this->faker->name,
			'kc_jawaban' => "b",
			'gambar' => $this->faker->name,
			'status' => 'Aktif',
        ];
    }
}
