<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunciNorma extends Model
{
    use HasFactory;    

    public $timestamps = true;

    protected $table = 'kunci_norma';

    protected $guarded = [];

   // protected $fillable = ['tipe','nama','waktu','nilai_min'];


   public static function getTipeUsia($usia)
    {
        $list_usia = [
                        [13, 13, "A"],
                        [14, 14, "B"],
                        [15, 15, "C"],
                        [16, 16, "D"],
                        [17, 17, "E"],
                        [18, 18, "F"],
                        [19, 20, "G"],
                        [21, 24, "H"],
                        [25, 28, "I"],
                        [29, 33, "J"],
                        [34, 39, "K"],
                        [40, 45, "L"],
                        [46, 52, "M"],
                    ];

        foreach ($list_usia as [$min, $max, $tipe]) {
            if ($usia >= $min && $usia <= $max) {
                return $tipe;
            }
        }

        return null; // Jika usia tidak masuk dalam rentang
    }

}
