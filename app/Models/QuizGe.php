<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizGe extends Model
{
    use HasFactory;    
    public $timestamps = true;
    protected $table = 'quiz_ge';
    protected $guarded = [];
    // protected $fillable = ['test_id','no','quiz','k1','k2'];

    public function test(){
        return $this->belongsTo(NormaTest::class, 'test_id');
    }
}
