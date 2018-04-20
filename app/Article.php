<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = [
        'title', 'thumb_image', 'short_description', 'conten', 'additional_conten', 'meta_title', 'meta_keyword', 'meta_description', 'position', 'published', 'slug', 'parent_id', 'longitude', 'latitude', 'link', 'more_config', 'admin_config', 'lang', 'equal_id'
    ];

    public function childs()
    {
        return $this->hasMany('App\Article', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Article', 'parent_id');
    }

    public function images() {
        return $this->hasMany('App\Images', 'article_id');
    }

    public function categories() {
        return $this->belongsToMany('App\Category', 'article_category', 'article_id', 'category_id')->withTimestamps();
    }

    public function getArticleThumbImageAttribute()
    {
        if ($this->thumb_image != '') {
            return asset('assets/front/images/' . $this->thumb_image);
        } else {
            return 'http://placehold.it/600x477';
        }
    }
}
