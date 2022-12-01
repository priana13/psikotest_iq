<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempExam extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function examEvent(){

        return $this->belongsTo(Examevent::class, 'examevent_id');
    }
}
