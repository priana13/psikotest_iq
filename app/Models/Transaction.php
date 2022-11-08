<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'transactions';

    protected $fillable = ['user_id','exam_id','payment_method_id','nominal','status'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exam()
    {
        return $this->hasOne('App\Models\Exam', 'id', 'exam_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentMethod()
    {
        return $this->hasOne('App\Models\PaymentMethod', 'id', 'payment_method_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}
