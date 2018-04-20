<?php

namespace App\Http\Controllers;

use App\Article;
use App\Images;
use App\Category;
use App\WebConfig;
use Illuminate\Http\Request;

class FFasilitasController extends Controller
{
    public function index() {
        $lang = \App::getLocale();
        $pagination = WebConfig::where('config_name', 'fasilitas_pagination')->first();
        if (!empty($pagination)) {
            $cfgpaginate = $pagination->value;
        } else {
            $cfgpaginate = 6;
        }
        $category = Category::has('article')->where('type', 'fasilitas')->where('lang', $lang)->get();
        $fasilitas = Article::where('link', \Lang::get('route.fasilitas',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $allfasilitas = $fasilitas->childs()->where('position', 'fasilitas')->where('published', '1')->where('lang', $lang)->paginate($cfgpaginate);

        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altarticle = Article::where('equal_id', $fasilitas->equal_id)->where('published', '1')->where('lang', $altlang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($altarticle)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$altarticle->link.'/'.$altarticle->slug));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        $altlink = json_encode($altlink);
        return view('front.fasilitas', compact('category','fasilitas', 'allfasilitas', 'altlink'));
    }

    public function detail($slug) {
        $lang = \App::getLocale();
        $galleryproduct = Images::where('type', 'gallery-product')->where('article_id', '==', 'id')->where('lang', $lang)->get();
        $fasilitas = Article::where('link', \Lang::get('route.fasilitas',[], $lang))->where('position', 'fasilitas')->where('slug', $slug)->where('published', '1')->where('lang', $lang)->firstOrFail();
        $fasilitaslainnya = Article::where('link', \Lang::get('route.fasilitas',[], $lang))->where('position', 'fasilitas')->where('id', '!=', $fasilitas->id)->where('published', '1')->where('lang', $lang)->orderBy('updated_at')->limit(3)->get();
        $headerimages = $fasilitas->images()->where('type', 'page-header')->where('lang', $lang)->get();

        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altarticle = Article::where('equal_id', $fasilitas->equal_id)->where('published', '1')->where('lang', $altlang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($altarticle)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$altarticle->link.'/'.$altarticle->slug));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        $altlink = json_encode($altlink);
        return view('front.fasilitasdetail', compact('galleryproduct','category','fasilitas', 'fasilitaslainnya', 'altlink', 'headerimages'));
    }
}
