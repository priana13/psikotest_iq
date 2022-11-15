<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'questions';

    protected $fillable = ['exam_id','no','soal','a','b','c','d','e','kc_jawaban','gambar','status'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exam()
    {
        return $this->hasOne('App\Models\Exam', 'id', 'exam_id');
    }

    public function scopeStep($query,$step){

        return $query->where('no' , $step);

    }
    
}
