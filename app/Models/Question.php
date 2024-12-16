<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'questions';

    protected $guarded = [];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exam()
    {
        return $this->hasOne('App\Models\Exam', 'id', 'exam_id');
    }

    public function examColumn(){

        return $this->belongsTo(ExamColumn::class, 'exam_column_id');
    }

    public function questionImages(){
        
        return $this->hasMany('App\Models\QuestionImage' , 'question_id');
    }


    public function scopeStep($query,$step){

        return $query->where('no' , $step);

    }

    
}
