<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
			'user_id' => $this->faker->name,
			'exam_id' => $this->faker->name,
			'payment_method_id' => $this->faker->name,
			'nominal' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
