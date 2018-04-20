<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Images;
use App\Services\MyImage;
use Illuminate\Http\Request;

class BAktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::where('link', \Lang::get('route.aktivitas',[], config('app.default_locale')))->where('position', 'menu-utama')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        $categories = Category::where('type', 'aktivitas')->where('lang', config('app.default_locale'))->get();
        $allaktivitas = Images::where('type', 'aktivitas')->where('lang', config('app.default_locale'))->get();
        return view('admin.webconfig.aktivitas.index', compact('categories', 'article', 'allaktivitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = Article::where('link', \Lang::get('route.aktivitas',[], config('app.default_locale')))->where('position', 'menu-utama')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        return view('admin.webconfig.aktivitas.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alllangs = config('app.all_langs');
        $deflang = config('app.default_locale');
        $eqid = uniqid('IMG', true);

        $rowRules = [
            'image' => 'required|mimes:jpeg,png|max:1024',
            'categories' => 'required'
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
            $data['type'] = 'aktivitas';
            $data['lang'] = $lang;
            $data['equal_id'] = $eqid;
            $data['article_id'] = Article::where('link', \Lang::get('route.aktivitas',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->first()->id;

            if ($lang == $deflang) {
                if ($request->hasFile('image')) {
                    $myimage = new MyImage();
                    $data['image'] = $myimage->saveImage($request->file('image'), $request->{'name_'.$lang});
                }
            } else {
                $data['image'] = ${'aktivitas_'.$deflang}->image;
            }
            ${'aktivitas_'.$lang} = Images::create($data);
            if ($lang == $deflang) {
                ${'aktivitas_'.$lang}->categories()->sync($request->categories);
            } else {
                $equalcat = Category::whereIn('id', $request->categories)->pluck('equal_id');
                $altcat = Category::whereIn('equal_id', $equalcat)->where('lang', $lang)->pluck('id');
                ${'aktivitas_'.$lang}->categories()->sync($altcat->toArray());
            }
        }
        \Session::flash('notification', ['level' => 'success', 'message' => 'Image aktivitas '.${'aktivitas_'.$deflang}->name.' saved.']);
        return redirect()->route('config.aktivitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($equalid)
    {
        $article = Article::where('link', \Lang::get('route.aktivitas',[], config('app.default_locale')))->where('position', 'menu-utama')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        $aktivitas = Images::where('type', 'aktivitas')->where('equal_id', $equalid)->get();
        return view('admin.webconfig.aktivitas.edit', compact('article', 'aktivitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $equalid)
    {
        $alllangs = config('app.all_langs');
        $deflang = config('app.default_locale');

        $images = Images::where('type', 'aktivitas')->where('equal_id', $equalid)->get();

        $rowRules = [
            'image' => 'mimes:jpeg,png|max:1024',
            'categories' => 'required'
        ];

        foreach($alllangs as $lang) {
            $langRules = [
                'name_'.$lang => 'required',
            ];
            $rowRules = array_merge($rowRules, $langRules);
        }
        $this->validate($request, $rowRules);

        foreach($alllangs as $lang) {
            ${'aktivitas_'.$lang} = $images->where('lang', $lang)->first();

            $data = [];
            $data['name'] = $request->{'name_'.$lang};

            if ($lang == $deflang) {
                if ($request->hasFile('image')) {
                    $myimage = new MyImage();
                    if (${'aktivitas_'.$deflang}->image != '') {
                        $myimage->deleteImage(${'aktivitas_'.$deflang}->image);
                    }
                    $data['image'] = $myimage->saveImage($request->file('image'), $request->{'name_'.$lang});
                }
            } else {
                $data['image'] = ${'aktivitas_'.$deflang}->image;
            }

            ${'aktivitas_'.$lang}->update($data);
            if ($lang == $deflang) {
                ${'aktivitas_'.$lang}->categories()->sync($request->categories);
            } else {
                $equalcat = Category::whereIn('id', $request->categories)->pluck('equal_id');
                $altcat = Category::whereIn('equal_id', $equalcat)->where('lang', $lang)->pluck('id');
                ${'aktivitas_'.$lang}->categories()->sync($altcat->toArray());
            }
        }

        \Session::flash('notification', ['level' => 'success', 'message' => 'Image aktivitas '.${'aktivitas_'.$deflang}->name.' updated.']);
        return redirect()->route('config.aktivitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($equalid)
    {
        $images = Images::where('equal_id', $equalid)->where('type', 'aktivitas')->get();
        foreach ($images as $image) {
            if ($image->image !== '') {
                $myimage = new MyImage();
                $myimage->deleteImage($image->image);
            }
            $image->categories()->detach();
        }
        Images::where('equal_id', $equalid)->delete();
        \Session::flash('notification', ['level' => 'success', 'message' => 'Aktivitas deleted.']);
        return redirect()->route('config.aktivitas.index');
    }
}
