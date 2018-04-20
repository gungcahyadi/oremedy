<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class FProgramController extends Controller
{
    public function detail($slug){
        $lang = \App::getLocale();
        $program = Article::where('link', \Lang::get('route.program',[], $lang))->where('position', 'program')->where('slug', $slug)->where('published', '1')->where('lang', $lang)->firstOrFail();
        $headerimages = $program->images()->where('type', 'page-header')->where('lang', $lang)->get();
        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altprogram = Article::where('equal_id', $program->equal_id)->where('published', '1')->where('lang', $altlang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($altprogram)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$altprogram->link.'/'.$altprogram->slug));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        $altlink = json_encode($altlink);
        return view('front.programdetail', compact('program', 'altlink', 'headerimages'));
    }
}
