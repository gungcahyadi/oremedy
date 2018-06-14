<?php namespace App\Http\ViewComposers;

use App\Article;
use App\Images;
use Illuminate\Contracts\View\View;

class FooterComposer {
    public function compose(View $view)
    {
        $lang = \App::getLocale();
        $fconten = Article::whereIn('position', ['footer-about', 'footer-hubungikami'])->where('lang', $lang)->where('published', '1')->get();
        $contact = Article::where('link', \Lang::get('route.contact',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $contactonpage = $contact->childs()->where('position', 'page')->where('published', '1')->where('lang', $lang)->first();
        $icon = images::where('type', 'icon')->where('lang', $lang)->get();
        $view->with(['footerconten' => $fconten, 'contact' => $contact, 'contactonpage' => $contactonpage, 'icon' => $icon ]);
    }
}
