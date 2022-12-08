<?php

namespace Database\Factories;

use App\Models\Confirmation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConfirmationFactory extends Factory
{
    protected $model = Confirmation::class;

    public function definition()
    {
        return [
			'transaction_id' => $this->faker->name,
			'atas_nama' => $this->faker->name,
			'rek_tujuan' => $this->faker->name,
			'tanggal_tf' => $this->faker->name,
			'jumlah' => $this->faker->name,
			'bukti_transfer' => $this->faker->name,
        ];
    }
}
