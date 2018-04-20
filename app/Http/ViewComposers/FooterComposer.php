<?php namespace App\Http\ViewComposers;

use App\Article;
use Illuminate\Contracts\View\View;

class FooterComposer {
    public function compose(View $view)
    {
        $lang = \App::getLocale();
        $fconten = Article::whereIn('position', ['footer-about', 'footer-hubungikami'])->where('lang', $lang)->where('published', '1')->get();
        $view->with('footerconten', $fconten);
    }
}
