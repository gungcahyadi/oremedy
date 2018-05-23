<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'name', 'image', 'link', 'with_link', 'type', 'conten', 'article_id', 'lang', 'equal_id'
    ];

    public function article() {
        return $this->belongsTo('App\Article', 'article_id');
    }

    public function categories() {
        return $this->belongsToMany('App\Category', 'images_category', 'image_id', 'category_id')->withTimestamps();
    }

    public function getHomeSliderAttribute()
    {
        if ($this->image !== '') {
            return asset('assets/front/images/' . $this->image);
        } else {
            return 'http://placehold.it/1600x730';
        }
    }
}
