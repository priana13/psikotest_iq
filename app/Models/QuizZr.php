<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizZr extends Model
{
    use HasFactory;    
    public $timestamps = true;
    protected $table = 'quiz_zr';
    protected $guarded = [];
    protected $fillable = ['test_id','no','quiz','k'];

    public function test(){
        return $this->belongsTo(NormaTest::class, 'test_id');
    }
}
