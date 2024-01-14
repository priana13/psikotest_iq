<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizMind extends Model
{
     use HasFactory;    
    public $timestamps = true;
    protected $table = 'quiz_mind';
    protected $guarded = [];
    protected $fillable = ['test_id','quiz','uraian'];

    public function test(){
        return $this->belongsTo(NormaTest::class, 'test_id');
    }
}
