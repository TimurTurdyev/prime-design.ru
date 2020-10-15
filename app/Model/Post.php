<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $table = 'posts';
    protected $fillable = ['category_id', 'slug', 'image', 'icons', 'name', 'title', 'description', 'body', 'sort_order'];
    protected $casts = [
        'icons' => 'array',
    ];
    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }

    public function images()
    {
        return $this->hasMany('App\Model\PostImage', 'post_id');
    }
}
