<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function page(){

        return $this->belongsTo(Post::class, 'post_id');
    }

    public function scopeName($query, $name){

        return $query->where('name', $name);
    }

}
