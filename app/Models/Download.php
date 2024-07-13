<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'downloads';

    protected $fillable = ['judul','ukuran_file','file','jumlah_download','keterangan'];
	
}
