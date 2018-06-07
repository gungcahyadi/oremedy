<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\WebConfig;
use Illuminate\Http\Request;

class FBlogController extends Controller
{
    public function index() {
        $lang = \App::getLocale();
        $pagination = WebConfig::where('config_name', 'blog_pagination')->first();
        if (!empty($pagination)) {
            $cfgpaginate = $pagination->value;
        } else {
            $cfgpaginate = 6;
        }
        $category = Category::has('article')->where('type', 'blog')->where('lang', $lang)->get();
        $blog = Article::where('link', \Lang::get('route.blog',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $allblog = $blog->childs()->where('position', 'blog')->where('published', '1')->where('lang', $lang)->paginate($cfgpaginate);

        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altarticle = Article::where('equal_id', $blog->equal_id)->where('published', '1')->where('lang', $altlang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($altarticle)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$altarticle->link.'/'.$altarticle->slug));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        // $altlink = json_encode($altlink);
        return view('front.blog', compact('category','blog', 'allblog', 'altlink'));
    }

    public function detail($slug) {
        $lang = \App::getLocale();
        $blog = Article::where('link', \Lang::get('route.blog',[], $lang))->where('position', 'blog')->where('slug', $slug)->where('published', '1')->where('lang', $lang)->firstOrFail();
        $datailcategory = $blog->categories()->where('type', 'blog')->where('lang', $lang)->first();
        $bloglainnya = Article::where('link', \Lang::get('route.blog',[], $lang))->where('position', 'blog')->where('id', '!=', $blog->id)->where('published', '1')->where('lang', $lang)->orderBy('updated_at')->limit(3)->get();

        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altarticle = Article::where('equal_id', $blog->equal_id)->where('published', '1')->where('lang', $altlang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($altarticle)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$altarticle->link.'/'.$altarticle->slug));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        // $altlink = json_encode($altlink);
        return view('front.blogdetail', compact('category','blog','datailcategory','slideimage', 'bloglainnya', 'altlink'));
    }
}
