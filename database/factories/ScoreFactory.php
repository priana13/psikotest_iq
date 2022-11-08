<?php

namespace Database\Factories;

use App\Models\Score;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ScoreFactory extends Factory
{
    protected $model = Score::class;

    public function definition()
    {
        return [
			'user_id' => $this->faker->name,
			'exam_id' => $this->faker->name,
			'benar' => $this->faker->name,
			'salah' => $this->faker->name,
			'kosong' => $this->faker->name,
			'score' => $this->faker->name,
			'keterangan' => $this->faker->name,
        ];
    }
}
