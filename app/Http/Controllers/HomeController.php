<?php

namespace App\Http\Controllers;

use App\Article;
use App\ContactMessage;
use App\Email;
use App\Pendaftaran;
use App\SocialLink;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadmin = User::get()->count();
        $jemail = Email::where('receipt', 1)->count();
        $jmenu = Article::where('position', 'menu-utama')->where('lang', \App::getLocale())->where('published', '1')->count();
        $jsocial = SocialLink::where('published', 1)->count();
        $messages = ContactMessage::where('status', 'waiting-confirmation')->get();
        $dataregistrasi = Pendaftaran::where('status', 'waiting-confirmation')->get();
        return view('admin.dashboard.index', compact('jadmin', 'jemail', 'jsocial', 'jmenu', 'messages', 'dataregistrasi'));
    }
}
