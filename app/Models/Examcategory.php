<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examcategory extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'examcategory';

    protected $guarded = [];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exams()
    {
        return $this->hasMany('App\Models\Exam', 'examcategory_id', 'id');
    }

    public function scopePg($query){

        return $query->where('type', 'PG');
    }

    public function scopeColumn($query){

        return $query->where('type', 'Column');
    }
    
}
