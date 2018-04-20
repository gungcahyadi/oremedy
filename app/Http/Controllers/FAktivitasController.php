<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class FAktivitasController extends Controller
{
    public function index() {
        $lang = \App::getLocale();
        $aktivitas = Article::where('link', \Lang::get('route.aktivitas',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $category = Category::has('images')->where('type', 'aktivitas')->where('lang', $lang)->get();
        $images = $aktivitas->images()->where('type', 'aktivitas')->where('lang', $lang)->get();

        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altarticle = Article::where('equal_id', $aktivitas->equal_id)->where('published', '1')->where('lang', $altlang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($altarticle)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$altarticle->link.'/'.$altarticle->slug));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        $altlink = json_encode($altlink);
        return view('front.aktivitas', compact('aktivitas', 'category', 'images', 'altlink'));
    }
}
