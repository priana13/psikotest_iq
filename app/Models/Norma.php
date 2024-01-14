<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Norma extends Model
{
    use HasFactory;    
    public $timestamps = true;
    protected $table = 'norma';
    protected $guarded = [];
    protected $fillable = ['tipe','nama','waktu','nilai_min','petunjuk_kesatu','petunjuk_kedua','file_petunjuk'];

    public function se(){
        return $this->hasMany(QuizSe::class, 'test_id'); 
    }
}
