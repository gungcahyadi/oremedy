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
        $allfasilitas = Article::where('position', 'fasilitas')->where('published', '1')->where('lang', $lang)->orderBy('updated_at', 'desc')->limit(4)->get();
        $program = Article::where('link', \Lang::get('route.program',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $allprogram = $program->childs()->where('position', 'program')->where('published', '1')->where('lang', $lang)->get();
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
        $altlink = json_encode($altlink);
        return view('front.index', compact('home', 'altlink', 'homeslider', 'allfasilitas', 'about', 'program', 'allprogram'));
    }
}
