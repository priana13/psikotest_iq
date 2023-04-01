<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Post extends Model
{
	use HasFactory , HasSEO;
	
    public $timestamps = true;

    protected $table = 'posts';

    protected $guarded = [];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function category(){

        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
