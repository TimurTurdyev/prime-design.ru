<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $guarded  = [];
    protected $table    = 'post_images';
    protected $fillable = ['post_id', 'image'];

    public function post()
    {
        return $this->belongsTo('App\Model\Post', 'id');
    }
}
