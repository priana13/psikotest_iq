<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'payment_methods';

    protected $fillable = ['name','bank','code','type','status'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'payment_method_id', 'id');
    }
    
}
