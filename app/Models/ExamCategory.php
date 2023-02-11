<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamCategory extends Model
{
    use HasFactory;

    protected $table = 'exam_categories';

    protected $guarded = [];

    public function exams(){

        return $this->hasMany(Exam::class);
    }

}
