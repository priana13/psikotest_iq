<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PaymentMethodFactory extends Factory
{
    protected $model = PaymentMethod::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'bank' => $this->faker->name,
			'code' => $this->faker->name,
			'type' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
