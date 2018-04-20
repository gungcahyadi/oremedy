<?php

namespace App\Http\Controllers;

use App\Article;
use App\Images;
use App\Services\MyImage;
use Illuminate\Http\Request;

class BHomeSliderController extends Controller
{
    public function index() {
        $article = Article::where('link', '/')->where('position', 'menu-utama')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        $homeslider = Images::where('type', 'home-slider')->where('lang', config('app.default_locale'))->get();
        return view('admin.webconfig.homeslider.index', compact('homeslider', 'article'));
    }

    public function create() {
        $article = Article::where('link', '/')->where('position', 'menu-utama')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        return view('admin.webconfig.homeslider.create', compact('article'));
    }

    public function store(Request $request) {
        $alllangs = config('app.all_langs');
        $deflang = config('app.default_locale');
        $eqid = uniqid('IMG', true);

        $rowRules = [
            'image' => 'required|mimes:jpeg,png|max:1024',
        ];
        foreach($alllangs as $lang) {
            $langRules = [
                'name_'.$lang => 'required',
            ];
            $rowRules = array_merge($rowRules, $langRules);
        }
        $this->validate($request, $rowRules);

        foreach($alllangs as $lang) {
            $data = [];
            $data['name'] = $request->{'name_'.$lang};
            $data['slider_conten'] = $request->{'slider_conten_'.$lang};
            $data['type'] = 'home-slider';
            $data['lang'] = $lang;
            $data['equal_id'] = $eqid;

            if ($lang == $deflang) {
                if ($request->hasFile('image')) {
                    $myimage = new MyImage();
                    $data['image'] = $myimage->saveImage($request->file('image'), $request->{'name_'.$lang});
                }
            } else {
                $data['image'] = ${'image_'.$deflang}->image;
            }
            ${'image_'.$lang} = Images::create($data);
        }
        \Session::flash('notification', ['level' => 'success', 'message' => 'Slider '.${'image_'.$deflang}->name.' saved.']);
        return redirect()->route('config.homeslider.index');
    }

    public function edit($equalid) {
        $article = Article::where('link', '/')->where('position', 'menu-utama')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        $slider = Images::where('type', 'home-slider')->where('equal_id', $equalid)->get();
        return view('admin.webconfig.homeslider.edit', compact('slider','article'));
    }

    public function update($equalid, Request $request) {
        $alllangs = config('app.all_langs');
        $deflang = config('app.default_locale');

        $images = Images::where('type', 'home-slider')->where('equal_id', $equalid)->get();

        $rowRules = [
            'image' => 'mimes:jpeg,png|max:1024',
        ];

        foreach($alllangs as $lang) {
            $langRules = [
                'name_'.$lang => 'required',
            ];
            $rowRules = array_merge($rowRules, $langRules);
        }
        $this->validate($request, $rowRules);

        foreach($alllangs as $lang) {
            ${'image_'.$lang} = $images->where('lang', $lang)->first();

            $data = [];
            $data['name'] = $request->{'name_'.$lang};
            $data['slider_conten'] = $request->{'slider_conten_'.$lang};

            if ($lang == $deflang) {
                if ($request->hasFile('image')) {
                    $myimage = new MyImage();
                    if (${'image_'.$deflang}->image != '') {
                        $myimage->deleteImage(${'image_'.$deflang}->image);
                    }
                    $data['image'] = $myimage->saveImage($request->file('image'), $request->{'name_'.$lang});
                }
            } else {
                $data['image'] = ${'image_'.$deflang}->image;
            }

            ${'image_'.$lang}->update($data);
        }

        \Session::flash('notification', ['level' => 'success', 'message' => 'Slider '.${'image_'.$deflang}->name.' updated.']);
        return redirect()->route('config.homeslider.index');
    }

    public function destroy($equalid) {
        $images = Images::where('equal_id', $equalid)->groupBy('image')->pluck('image');
        foreach ($images as $image) {
            if ($image !== '') {
                $myimage = new MyImage();
                $myimage->deleteImage($image);
            }
        }
        Images::where('equal_id', $equalid)->delete();
        \Session::flash('notification', ['level' => 'success', 'message' => 'Home slider deleted.']);
        return redirect()->route('config.homeslider.index');
    }
}
