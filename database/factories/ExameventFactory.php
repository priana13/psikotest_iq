<?php

namespace Database\Factories;

use App\Models\Examevent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExameventFactory extends Factory
{
    protected $model = Examevent::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'salah' => $this->faker->name,
			'nilai' => $this->faker->name,
			'benar' => $this->faker->name,
        ];
    }
}
