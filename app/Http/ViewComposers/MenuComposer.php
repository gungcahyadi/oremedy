<?php namespace App\Http\ViewComposers;

use App\Article;
use Illuminate\Contracts\View\View;

class MenuComposer {
    public function compose(View $view)
    {
        $lang = \App::getLocale();
        $menusegment = 2;
        $mutama = Article::where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->select('id','title','link', 'slug', 'parent_id')->orderBy('id')->get();
        $view->with(['mutama' => $mutama, 'menusegment' => $menusegment]);
    }
}
