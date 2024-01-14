<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormaTestLog extends Model
{
    use HasFactory;    
    public $timestamps = true;
    protected $table = 'norma_test_log';
    protected $guarded = [];
    protected $fillable = ['user_id','nomor_test','test_id','waktu_test','waktu_mulai','waktu_selesai','status'];

    public function test(){
        return $this->belongsTo(NormaTest::class, 'test_id');
    }
}
