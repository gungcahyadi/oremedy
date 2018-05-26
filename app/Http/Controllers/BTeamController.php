<?php

namespace App\Http\Controllers;

use App\Images;
use App\Services\MyImage;
use Illuminate\Http\Request;

class BTeamController extends Controller
{
    public function index() {
        $team = Images::where('type', 'team')->where('lang', config('app.default_locale'))->get();
        return view('admin.webconfig.team.index', compact('team'));
    }

    public function create() {
        $team = Images::where('lang', config('app.default_locale'))->firstOrFail();
        return view('admin.webconfig.team.create', compact('team'));
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
            $data['conten'] = $request->{'conten_'.$lang};
            $data['type'] = 'team';
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
        \Session::flash('notification', ['level' => 'success', 'message' => 'Team '.${'image_'.$deflang}->name.' saved.']);
        return redirect()->route('config.team.index');
    }

    public function edit($equalid) {
        $team = Images::where('type', 'team')->where('equal_id', $equalid)->get();
        return view('admin.webconfig.team.edit', compact('team'));
    }

    public function update($equalid, Request $request) {
        $alllangs = config('app.all_langs');
        $deflang = config('app.default_locale');

        $images = Images::where('type', 'team')->where('equal_id', $equalid)->get();

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
            $data['conten'] = $request->{'conten_'.$lang};

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

        \Session::flash('notification', ['level' => 'success', 'message' => 'Team '.${'image_'.$deflang}->name.' updated.']);
        return redirect()->route('config.team.index');
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
        \Session::flash('notification', ['level' => 'success', 'message' => 'Team deleted.']);
        return redirect()->route('config.team.index');
    }
}
