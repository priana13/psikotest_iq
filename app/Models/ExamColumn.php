<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamColumn extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function questions(){

        return $this->hasMany(Question::class, 'exam_column_id');
    }
}
