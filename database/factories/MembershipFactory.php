<?php

namespace Database\Factories;

use App\Models\Membership;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MembershipFactory extends Factory
{
    protected $model = Membership::class;

    public function definition()
    {
        return [
			'user_id' => $this->faker->name,
			'member_type' => $this->faker->name,
			'start' => $this->faker->name,
			'end' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
