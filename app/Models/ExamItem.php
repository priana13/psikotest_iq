<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamItem extends Model
{
    use HasFactory;

    protected $table = 'exam_items';

    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function question(){

        return $this->belongsTo(Question::class, 'question_id');
    }

    public function scopeBenar($query){

        return $query->where('is_true' , 1);
    }

    public function scopeSalah($query){

        return $query->where('is_true' , 0);
    }
}
