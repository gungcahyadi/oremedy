<?php namespace App\Http\ViewComposers;

use App\SocialLink;
use Illuminate\Contracts\View\View;

class SocialMediaComposer {
    public function compose(View $view)
    {
        $social = SocialLink::where('published', '1')->get();
        $view->with('socialmedias', $social);
    }
}
