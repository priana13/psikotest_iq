<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'packages';

    protected $guarded = [];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packageExams()
    {
        return $this->hasMany('App\Models\PackageExam', 'package_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'package_id', 'id');
    }
    
}
