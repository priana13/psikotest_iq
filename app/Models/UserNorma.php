<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNorma extends Model
{
    use HasFactory;

    protected $table = 'user_norma';

    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
