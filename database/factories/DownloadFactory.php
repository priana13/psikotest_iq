<?php

namespace Database\Factories;

use App\Models\Download;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DownloadFactory extends Factory
{
    protected $model = Download::class;

    public function definition()
    {
        return [
			'judul' => $this->faker->name,
			'ukuran_file' => $this->faker->name,
			'file' => $this->faker->name,
			'jumlah_download' => $this->faker->name,
			'keterangan' => $this->faker->name,
        ];
    }
}
