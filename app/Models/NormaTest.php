<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormaTest extends Model
{
    use HasFactory;    
    public $timestamps = true;
    protected $table = 'norma_test';
    protected $guarded = [];
    protected $fillable = ['user_id','quiz_id','test_id','k','j','nilai'];
}
