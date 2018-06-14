<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BOnPageController extends Controller
{
    public function contact() {
        $eqid = Article::where('link', \Lang::get('route.contact',[], config('app.default_locale')))->where('position', 'menu-utama')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail()->equal_id;
        $contacts = Article::where('equal_id', $eqid)->get();
        return view('admin.webconfig.on-page.contact', compact('contacts'));
    }
    public function about() {
        $eqid = Article::where('link', \Lang::get('route.about',[], config('app.default_locale')))->where('position', 'menu-utama')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail()->equal_id;
        $about = Article::where('equal_id', $eqid)->get();
        return view('admin.webconfig.on-page.about', compact('about'));
    }

    public function updateabout(Request $request) {
        $rowRules = [
            'michoose' => 'sometimes|required',
            'hfchoose' => 'sometimes|required',
            'cichoose' => 'sometimes|required',
            'cochoose' => 'sometimes|required',
        ];

        $validator = \Validator::make($request->toArray(), $rowRules);
        if ($validator->passes()) {
            $about = Article::where('link', \Lang::get('route.about',[], $request->lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $request->lang)->firstOrFail();
            $aboutonpage = $about->childs()->where('position', 'page')->where('published', '1')->where('lang', $request->lang)->get();

            $michoose = $aboutonpage->where('slug', \Lang::get('slug.mi-choose',[], $request->lang))->first();
            if ($request->has('michoose')) {
                if ($request->michoose !== '' && !empty($michoose)) {
                    $michoose->update(['conten' => $request->michoose]);
                }
            }
            $hfchoose = $aboutonpage->where('slug', \Lang::get('slug.hf-choose',[], $request->lang))->first();
            if ($request->has('hfchoose')) {
                if ($request->hfchoose !== '' && !empty($hfchoose)) {
                    $hfchoose->update(['conten' => $request->hfchoose]);
                }
            }

            $cichoose = $aboutonpage->where('slug', \Lang::get('slug.ci-choose',[], $request->lang))->first();
            if ($request->has('cichoose')) {
                if ($request->cichoose !== '' && !empty($cichoose)) {
                    $cichoose->update(['conten' => $request->cichoose]);
                }
            }

            $cochoose = $aboutonpage->where('slug', \Lang::get('slug.co-choose',[], $request->lang))->first();
            if ($request->has('cochoose')) {
                if ($request->cochoose !== '' && !empty($cochoose)) {
                    $cochoose->update(['conten' => $request->cochoose]);
                }
            }
        } else {
            return back()->withErrors($validator, $request->lang);
        }

        \Session::flash('notification', ['level' => 'success', 'message' => 'On page description updated.']);
        return redirect()->route('menu-utama.index');
    }

    public function updatecontact(Request $request) {
        $rowRules = [
            'ctoffice' => 'sometimes|required',
            'ctwa' => 'sometimes|required',
            'ctcall' => 'sometimes|required',
            'ctemail' => 'sometimes|required',
        ];

        $validator = \Validator::make($request->toArray(), $rowRules);
        if ($validator->passes()) {
            $contact = Article::where('link', \Lang::get('route.contact',[], $request->lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $request->lang)->firstOrFail();
            $contactonpage = $contact->childs()->where('position', 'page')->where('published', '1')->where('lang', $request->lang)->get();

            $ctoffice = $contactonpage->where('slug', \Lang::get('slug.ct-office',[], $request->lang))->first();
            if ($request->has('ctoffice')) {
                if ($request->ctoffice !== '' && !empty($ctoffice)) {
                    $ctoffice->update(['conten' => $request->ctoffice]);
                }
            }
            $ctwa = $contactonpage->where('slug', \Lang::get('slug.ct-wa',[], $request->lang))->first();
            if ($request->has('ctwa')) {
                if ($request->ctwa !== '' && !empty($ctwa)) {
                    $ctwa->update(['conten' => $request->ctwa]);
                }
            }

            $ctcall = $contactonpage->where('slug', \Lang::get('slug.ct-call',[], $request->lang))->first();
            if ($request->has('ctcall')) {
                if ($request->ctcall !== '' && !empty($ctcall)) {
                    $ctcall->update(['conten' => $request->ctcall]);
                }
            }

            $ctemail = $contactonpage->where('slug', \Lang::get('slug.ct-email',[], $request->lang))->first();
            if ($request->has('ctemail')) {
                if ($request->ctemail !== '' && !empty($ctemail)) {
                    $ctemail->update(['conten' => $request->ctemail]);
                }
            }
        } else {
            return back()->withErrors($validator, $request->lang);
        }

        \Session::flash('notification', ['level' => 'success', 'message' => 'On page description updated.']);
        return redirect()->route('menu-utama.index');
    }
}
