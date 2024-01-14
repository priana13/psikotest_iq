<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizWa extends Model
{
     use HasFactory;    
    public $timestamps = true;
    protected $table = 'quiz_wa';
    protected $guarded = [];
    protected $fillable = ['test_id','no','a','b','c','d','e','k'];

    public function test(){
        return $this->belongsTo(NormaTest::class, 'test_id');
    }
}
