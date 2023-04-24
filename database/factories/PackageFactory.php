<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition()
    {
        return [
            'type' => 'bulanan',
			'name' => "Voucher Bulanan",
			'qty' => 1,
			'price' => 195000,
			'detail' => "Akses Membership Bulanan",
            'type' => 'full'
        ];
    }
}
