<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Te extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tes';

    protected $fillable = ['nama_tes','waktu','nilai_min','peraturan'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilais()
    {
        return $this->hasMany('App\Models\Nilai', 'tes_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function soals()
    {
        return $this->hasMany('App\Models\Soal', 'tes_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'tes_id', 'id');
    }
    
}
