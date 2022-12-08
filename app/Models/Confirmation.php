<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'confirmations';

    protected $fillable = ['transaction_id','atas_nama','rek_tujuan','tanggal_tf','jumlah','bukti_transfer'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transaction()
    {
        return $this->hasOne('App\Models\Transaction', 'id', 'transaction_id');
    }
    
}
