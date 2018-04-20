<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FHomeController extends Controller
{
    public function index(Request $request) {
        $cokielang = $request->cookie('btc_lang');
        if ($cokielang !== null) {
            return redirect($cokielang);
        } else {
            return redirect(config('app.locale_prefix'));
        }
    }
}
