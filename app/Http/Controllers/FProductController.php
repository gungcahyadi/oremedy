<?php

namespace App\Http\Controllers;

use App\Article;
use App\Images;
use App\Category;
use App\WebConfig;
use Illuminate\Http\Request;

class FProductController extends Controller
{
    public function index() {
        $lang = \App::getLocale();
        $pagination = WebConfig::where('config_name', 'product_pagination')->first();
        if (!empty($pagination)) {
            $cfgpaginate = $pagination->value;
        } else {
            $cfgpaginate = 6;
        }
        $category = Category::has('article')->where('type', 'product')->where('lang', $lang)->get();
        $product = Article::where('link', \Lang::get('route.product',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $allproduct = $product->childs()->where('position', 'product')->where('published', '1')->where('lang', $lang)->paginate($cfgpaginate);

        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altarticle = Article::where('equal_id', $product->equal_id)->where('published', '1')->where('lang', $altlang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($altarticle)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$altarticle->link.'/'.$altarticle->slug));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        // $altlink = json_encode($altlink);
        return view('front.product', compact('category','product', 'allproduct', 'altlink'));
    }

    public function detail($slug) {
        $lang = \App::getLocale();
        $product = Article::where('link', \Lang::get('route.product',[], $lang))->where('position', 'product')->where('slug', $slug)->where('published', '1')->where('lang', $lang)->firstOrFail();
        $datailcategory = $product->categories()->where('type', 'product')->where('lang', $lang)->first();
        $slideimage = $product->images()->where('type', 'product')->where('lang', $lang)->get();
        $productlainnya = Article::where('link', \Lang::get('route.product',[], $lang))->where('position', 'product')->where('id', '!=', $product->id)->where('published', '1')->where('lang', $lang)->orderBy('updated_at')->limit(3)->get();
        $headerimages = $product->images()->where('type', 'page-header')->where('lang', $lang)->get();

        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altarticle = Article::where('equal_id', $product->equal_id)->where('published', '1')->where('lang', $altlang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($altarticle)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$altarticle->link.'/'.$altarticle->slug));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        // $altlink = json_encode($altlink);
        return view('front.productdetail', compact('category','product','datailcategory','slideimage', 'productlainnya', 'altlink', 'headerimages'));
    }
}
