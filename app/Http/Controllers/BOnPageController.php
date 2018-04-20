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

    public function updatecontact(Request $request) {
        $rowRules = [
            'ctoffice' => 'sometimes|required',
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
