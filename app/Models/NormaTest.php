<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormaTest extends Model
{
    use HasFactory;    
    public $timestamps = true;
    protected $table = 'norma_test';
    protected $guarded = [];
    // protected $fillable = ['user_id','quiz_id','test_id','k','j','nilai'];

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function norma(){

        return $this->belongsTo(Norma::class, 'test_id');
    }
}
