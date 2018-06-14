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
        $blog = Article::where('link', \Lang::get('route.blog',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $pagination = WebConfig::where('config_name', 'blog_pagination')->first();
        if (!empty($pagination)) {
            $cfgpaginate = $pagination->value;
        } else {
            $cfgpaginate = 6;
        }
        $blogcategories = Category::where('lang', $lang)->where('type', 'blog')->whereHas('article', function($query) use ($lang) {$query->where('lang', $lang); })->orderBy('created_at', 'desc')->get();
        $blogarchive = Article::where('position', 'blog')->where('link', \Lang::get('route.blog',[], $lang))->where('published', '1')->where('lang', $lang)->selectRaw('updated_at, LEFT(updated_at,7) as thbln, COUNT(LEFT(updated_at,7)) as jumlah')->orderBy('thbln', 'desc')->take(12)->groupBy('thbln')->get();
        $blogrecent = Article::where('position', 'blog')->where('link', \Lang::get('route.blog',[], $lang))->where('published', '1')->where('lang', $lang)->orderBy('updated_at', 'desc')->take(4)->get();
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
        return view('front.blog', compact('blog','blogcategories','blogarchive','blogrecent', 'allblog', 'altlink'));
    }

    public function detail($slug) {
        $lang = \App::getLocale();
        $parentblog = Article::where('link', \Lang::get('route.blog',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();

        $blog = Article::where('link', \Lang::get('route.blog',[], $lang))->where('position', 'blog')->where('slug', $slug)->where('published', '1')->where('lang', $lang)->firstOrFail();
        $blogcategories = Category::where('lang', $lang)->where('type', 'blog')->whereHas('article', function($query) use ($lang) {$query->where('lang', $lang); })->orderBy('created_at', 'desc')->get();
        $blogarchive = Article::where('position', 'blog')->where('link', \Lang::get('route.blog',[], $lang))->where('published', '1')->where('lang', $lang)->selectRaw('updated_at, LEFT(updated_at,7) as thbln, COUNT(LEFT(updated_at,7)) as jumlah')->orderBy('thbln', 'desc')->take(12)->groupBy('thbln')->get();
        $blogrecent = Article::where('position', 'blog')->where('link', \Lang::get('route.blog',[], $lang))->where('published', '1')->where('lang', $lang)->orderBy('updated_at', 'desc')->take(4)->get();
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
        return view('front.blogdetail', compact('parentblog','blogcategories','blogarchive','blogrecent', 'blog','altlink'));
    }
    public function archive($thbln) {
        $lang = \App::getLocale();
        $cfg = WebConfig::where('config_name', 'blog_pagination')->first();

        $parentblog = Article::where('link', \Lang::get('route.blog',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $allblog = Article::where('link', \Lang::get('route.blog',[], $lang))->where('position', 'blog')->where('published', '1')->where('lang', $lang)->where('slug', '!=', '')->where(\DB::raw('LEFT(updated_at,7)'), $thbln)->orderBy('updated_at', 'desc')->paginate($cfg->value);
        $blogcategories = Category::where('lang', $lang)->where('type', 'blog')->whereHas('article', function($query) use ($lang) {$query->where('lang', $lang); })->orderBy('created_at', 'desc')->get();
        $blogarchive = Article::where('position', 'blog')->where('link', \Lang::get('route.blog',[], $lang))->where('published', '1')->where('lang', $lang)->selectRaw('updated_at, LEFT(updated_at,7) as thbln, COUNT(LEFT(updated_at,7)) as jumlah')->orderBy('thbln', 'desc')->take(12)->groupBy('thbln')->get();
        $blogrecent = Article::where('position', 'blog')->where('link', \Lang::get('route.blog',[], $lang))->where('published', '1')->where('lang', $lang)->orderBy('updated_at', 'desc')->take(4)->get();
        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altprefix = $altlang;
            $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.\Lang::get('route.blog',[], $altlang).'/archive/'.$thbln));
        }
        return view('front.blogarchive', compact('thbln','blogcategories','blogarchive','blogrecent', 'allblog', 'parentblog', 'altlink'));
    }

    public function categories($slug) {
        $lang = \App::getLocale();
        $cfg = WebConfig::where('config_name', 'blog_pagination')->first();
        $parentblog = Article::where('link', \Lang::get('route.blog',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $category = Category::where('lang', $lang)->where('type', 'blog')->where('slug', $slug)->firstOrFail();      
        $allblog = $category->article(function ($query) use ($lang) {$query->where('link', \Lang::get('route.blog',[], $lang))->where('lang', $lang)->where('position', 'blog')->where('published', '1');})->orderBy('article.updated_at', 'desc')->paginate($cfg->value);
        $blogcategories = Category::where('lang', $lang)->where('type', 'blog')->whereHas('article', function($query) use ($lang) {$query->where('lang', $lang); })->orderBy('created_at', 'desc')->get();
        $blogarchive = Article::where('position', 'blog')->where('link', \Lang::get('route.blog',[], $lang))->where('published', '1')->where('lang', $lang)->selectRaw('updated_at, LEFT(updated_at,7) as thbln, COUNT(LEFT(updated_at,7)) as jumlah')->orderBy('thbln', 'desc')->take(12)->groupBy('thbln')->get();
        $blogrecent = Article::where('position', 'blog')->where('link', \Lang::get('route.blog',[], $lang))->where('published', '1')->where('lang', $lang)->orderBy('updated_at', 'desc')->take(4)->get();
        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altcat = Category::where('lang', $lang)->where('type', 'blog')->where('equal_id', $category->equal_id)->first();
            $altprefix = $altlang;
            if (!empty($altcat)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.\Lang::get('route.blog',[], $altlang).'/category/'.$altcat->slug));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        return view('front.blogcategory', compact('allblog','blogcategories','blogarchive','blogrecent', 'parentblog', 'category', 'altlink'));
    }
}
