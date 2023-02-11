<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examcategory extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'examcategory';

    protected $fillable = ['name','type'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exams()
    {
        return $this->hasMany('App\Models\Exam', 'examcategory_id', 'id');
    }
    
}
