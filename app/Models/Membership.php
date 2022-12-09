<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'memberships';

    protected $fillable = ['user_id','member_type','start','end','status'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function scopeActive($query){

        return $query->where('status','active');
    }
    
}
