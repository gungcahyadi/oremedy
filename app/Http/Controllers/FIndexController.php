<?php

namespace App\Http\Controllers;

use App\Article;
use App\Images;
use Illuminate\Http\Request;

class FIndexController extends Controller
{
    public function index() {
        $lang = \App::getLocale();
        $home = Article::where('link', '/')->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $homeslider = Images::where('type', 'home-slider')->where('lang', $lang)->get();
        $about = Article::where('link', \Lang::get('route.about',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $whychoose = Article::where('position', 'why-choose')->where('published', '1')->where('lang', $lang)->first();
        $contenwhychoose = $whychoose->childs()->where('position', 'page')->where('published', '1')->where('lang', $lang)->limit(4)->get();
        $contact = Article::where('link', \Lang::get('route.contact',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $allproduct = Article::where('position', 'product')->where('published', '1')->where('lang', $lang)->orderBy('updated_at', 'desc')->where('display', '1')->get();
        $onpage = Article::where('position', 'page')->where('lang', $lang)->first();
        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $althome = Article::where('link', '/')->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($althome)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$althome->link));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        // $altlink = json_encode($altlink);
        return view('front.index', compact('home', 'altlink', 'homeslider', 'allproduct','onpage', 'about', 'whychoose','contenwhychoose','contact','contactimage', 'program', 'allprogram'));
    }
}
