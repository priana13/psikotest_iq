<?php

namespace Database\Factories;

use App\Models\Te;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeFactory extends Factory
{
    protected $model = Te::class;

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
