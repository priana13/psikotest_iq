<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUserNorma extends Model
{
    use HasFactory;    
    public $timestamps = true;
    protected $table = 'user_norma';
    protected $guarded = [];
    protected $fillable = ['user_id','nomor_test','tgl_lahir','pendidikan','instansi'];

    public function test(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

