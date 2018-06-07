<?php

namespace App\Http\Controllers;

use App\Article;
use App\ContactMessage;
use App\Email;
use Illuminate\Http\Request;

class FContactController extends Controller
{
    public function index() {
        $lang = \App::getLocale();
        $contact = Article::where('link', \Lang::get('route.contact',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();
        $contactonpage = $contact->childs()->where('position', 'page')->where('published', '1')->where('lang', $lang)->get();
        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altarticle = Article::where('equal_id', $contact->equal_id)->where('published', '1')->where('lang', $altlang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($altarticle)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$altarticle->link.'/'.$altarticle->slug));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        // $altlink = json_encode($altlink);
        return view('front.contact', compact('contact', 'altlink', 'contactonpage'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:18',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $data = $request->only('subject', 'message', 'name', 'email', 'phone');
        $data['messageLines'] = explode("\n", $request->get('message'));

        ContactMessage::create($data);

        $emails = Email::where('receipt',1)->get();

        foreach($emails as $email) {
            \Mail::send('emails.contact', $data, function ($mail) use ($data, $email)
            {
                $mail->to($email->email, $email->name);
                $mail->subject('BTC Contact From: '.$data['name']);
            });
        }
        \Session::flash('notification', ['level' => 'success', 'message' => \Lang::get('front.ct-submitmess',[], \App::getLocale())]);
        return back();
    }
}
