<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizWu extends Model
{
    use HasFactory;    
    public $timestamps = true;
    protected $table = 'quiz_wu';
    protected $guarded = [];
    // protected $fillable = ['test_id','no','quiz','a','b','c','d','e','k'];

    public function test(){
        return $this->belongsTo(NormaTest::class, 'test_id');
    }
}
