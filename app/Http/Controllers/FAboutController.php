<?php

namespace App\Http\Controllers;

use App\Article;
use App\Images;
use Illuminate\Http\Request;

class FAboutController extends Controller
{
    public function index() {
        $lang = \App::getLocale();
        $about = Article::where('link', \Lang::get('route.about',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $team = Images::where('type', 'team')->where('lang', $lang)->get();
        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altabout = Article::where('link', \Lang::get('route.about',[], $altlang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $altlang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($altabout)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$altabout->link));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        // $altlink = json_encode($altlink);
        return view('front.about', compact('about','team', 'altlink'));
    }
}
