<?php

namespace App\Http\Controllers;

use App\Images;
use App\Services\MyImage;
use Illuminate\Http\Request;

class BIconController extends Controller
{
    public function index() {
        $icon = Images::where('type', 'icon')->where('lang', config('app.default_locale'))->get();
        return view('admin.webconfig.icon.index', compact('icon'));
    }
    public function edit($equalid) {
        $icon = Images::where('type', 'icon')->where('equal_id', $equalid)->get();
        return view('admin.webconfig.icon.edit', compact('icon'));
    }

    public function update($equalid, Request $request) {
        $alllangs = config('app.all_langs');
        $deflang = config('app.default_locale');

        $images = Images::where('type', 'icon')->where('equal_id', $equalid)->get();

        $rowRules = [
            'image' => 'mimes:jpeg,png|max:1024',
            'name' => 'required',
        ];
        $this->validate($request, $rowRules);

        foreach($alllangs as $lang) {
            ${'image_'.$lang} = $images->where('lang', $lang)->first();

            $data = [];
            $data['name'] = $request->name;
            if ($lang == $deflang) {
                if ($request->hasFile('image')) {
                    $myimage = new MyImage();
                    if (${'image_'.$deflang}->image != '') {
                        $myimage->deleteImage(${'image_'.$deflang}->image);
                    }
                    $data['image'] = $myimage->saveImage($request->file('image'), $request->name);
                }
            } else {
                $data['image'] = ${'image_'.$deflang}->image;
            }

            ${'image_'.$lang}->update($data);
        }

        \Session::flash('notification', ['level' => 'success', 'message' => 'Icon '.${'image_'.$deflang}->name.' updated.']);
        return redirect()->route('config.icon.index');
    }
}
