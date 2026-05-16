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

    public function test(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

