<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'category', 'type', 'slug', 'lang', 'equal_id'
    ];

    public function article() {
        return $this->belongsToMany('App\Article', 'article_category', 'category_id', 'article_id')->withTimestamps();
    }

    public function images() {
        return $this->belongsToMany('App\Images', 'images_category', 'category_id', 'image_id')->withTimestamps();
    }
}
