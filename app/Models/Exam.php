<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exam extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'exams';

    protected $guarded = [];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'exam_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores()
    {
        return $this->hasMany('App\Models\Score', 'exam_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'exam_id', 'id');
    }

    public function exam_category():BelongsTo
    {

        return $this->belongsTo(Examcategory::class, 'examcategory_id');
    }

    public function scopeType($query,$type){
        
       return $query->where('type' , $type);
    }
    
}
