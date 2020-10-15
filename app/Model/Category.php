<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded  = [];
    protected $table    = 'categories';
    protected $fillable = ['type', 'name', 'title', 'description', 'body', 'slug', 'image'];

    public function posts(){
        return $this->hasMany('App\Model\Post', 'category_id');
    }
}
