<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TryOut extends Model
{
    use HasFactory;

    protected $table = 'tryouts';

    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
