<?php

namespace Database\Factories;

use App\Models\Examcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExamcategoryFactory extends Factory
{
    protected $model = Examcategory::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'type' => $this->faker->name,
        ];
    }
}
