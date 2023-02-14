<?php

namespace Database\Factories;

use App\Models\ExamCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExamCategoryFactory extends Factory
{
    protected $model = ExamCategory::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'type' => $this->faker->name,
        ];
    }
}
