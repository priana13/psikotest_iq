<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examevent extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'examevents';

    protected $guarded = [];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function examItems()
    {
        return $this->hasMany('App\Models\ExamItem', 'examevent_id', 'id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function tempExams(){

        return $this->hasMany(TempExam::class, 'examevent_id');
    }


    
}
