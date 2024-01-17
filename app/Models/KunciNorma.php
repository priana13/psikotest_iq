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

}
