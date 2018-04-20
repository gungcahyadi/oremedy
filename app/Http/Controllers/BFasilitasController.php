<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Services\MyImage;
use Illuminate\Http\Request;
use App\Images;

class BFasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::where('link', \Lang::get('route.fasilitas',[], config('app.default_locale')))->where('more_config', '1')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        $allfasilitas = Article::where('link', \Lang::get('route.fasilitas',[], config('app.default_locale')))->where('position', 'fasilitas')->where('slug', '!=', '')->where('lang', config('app.default_locale'))->get();
        return view('admin.webconfig.fasilitas.index', compact('article','categories', 'allfasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = Article::where('link', \Lang::get('route.fasilitas',[], config('app.default_locale')))->where('more_config', '1')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        return view('admin.webconfig.fasilitas.create', compact('article'));
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
        $eqid = uniqid('ART', true);

        $rowRules = [];
        foreach($alllangs as $lang) {
            if ($lang == config('app.default_locale')) {
                $langRules = [
                    'title_'.$lang => 'required',
                    'short_description_'.$lang => 'required',
                    'conten_'.$lang => 'required',
                    'price_'.$lang => 'required',
                    'meta_title_'.$lang => 'required',
                    'meta_keyword_'.$lang => 'required',
                    'meta_description_'.$lang => 'required',
                    'published' => 'required|in:1,0',
                    'thumb_image' => 'required|mimes:jpeg,png|max:1024',
                ];
            } else {
                $langRules = [
                    'title_'.$lang => 'required',
                    'short_description_'.$lang => 'required',
                    'conten_'.$lang => 'required',
                    'price_'.$lang => 'required',
                    'meta_title_'.$lang => 'required',
                    'meta_keyword_'.$lang => 'required',
                    'meta_description_'.$lang => 'required',
                ];
            }

            $rowRules = array_merge($rowRules, $langRules);
        }
        $this->validate($request, $rowRules);

        foreach($alllangs as $lang) {
            $data = [];
            $data['title'] = $request->{'title_'.$lang};
            $data['short_description'] = $request->{'short_description_'.$lang};
            $data['conten'] = $request->{'conten_'.$lang};
            $data['price'] = $request->{'price_'.$lang};
            $data['type'] = 'fasilitas';
            $data['meta_title'] = $request->{'meta_title_'.$lang};
            $data['meta_keyword'] = $request->{'meta_keyword_'.$lang};
            $data['meta_description'] = $request->{'meta_description_'.$lang};
            $data['slug'] = str_slug($request->{'title_'.$lang});
            $data['position'] = 'fasilitas';
            $data['link'] = \Lang::get('route.fasilitas',[], $lang);
            $data['lang'] = $lang;
            $data['equal_id'] = $eqid;
            $data['published'] = $request->published;
            $data['parent_id'] = Article::where('link', \Lang::get('route.fasilitas',[], $lang))->where('more_config', '1')->where('published', '1')->where('lang', $lang)->first()->id;

            if ($lang == config('app.default_locale')) {
                if ($request->hasFile('thumb_image')) {
                    $myimage = new MyImage();
                    $data['thumb_image'] = $myimage->saveImage($request->file('thumb_image'), $request->{'title_'.$lang});
                }
            } else {
                $data['thumb_image'] = ${'fs_'.$deflang}->thumb_image;
            }

            ${'fs_'.$lang} = Article::create($data);
        }

        \Session::flash('notification', ['level' => 'success', 'message' => 'Article fasilitas '.${'fs_'.$deflang}->title.' saved.']);
        return redirect()->route('config.fasilitas.index');
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
        $article = Article::where('link', \Lang::get('route.fasilitas',[], config('app.default_locale')))->where('more_config', '1')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        $fasilitas = Article::where('slug', '!=', '')->where('equal_id', $equalid)->get();
        return view('admin.webconfig.fasilitas.edit', compact('article', 'fasilitas'));
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
        $fasilitas = Article::where('equal_id', $equalid)->where('lang', $request->lang)->firstOrFail();
        if ($request->lang == config('app.default_locale')) {
            $rowRules = [
                'title' => 'required',
                'short_description' => 'required',
                'conten' => 'required',
                'meta_title' => 'required',
                'meta_keyword' => 'required',
                'meta_description' => 'required',
                'published' => 'required|in:1,0',
                'thumb_image' => 'mimes:jpeg,png|max:1024',
            ];
        } else {
            $rowRules = [
                'title' => 'required',
                'short_description' => 'required',
                'conten' => 'required',
                'meta_title' => 'required',
                'meta_keyword' => 'required',
                'meta_description' => 'required',
            ];
        }
        $validator = \Validator::make($request->toArray(), $rowRules);
        if ($validator->passes()) {
            if ($request->lang == config('app.default_locale')) {
                $data = $request->only('title', 'short_description', 'conten', 'meta_title', 'meta_keyword', 'meta_description', 'published');
                if ($request->hasFile('thumb_image')) {
                    $myimage = new MyImage();
                    if ($fasilitas->thumb_image != '') {
                        $myimage->deleteImage($fasilitas->thumb_image);
                    }
                    $data['thumb_image'] = $myimage->saveImage($request->file('thumb_image'), $request->title);
                    Article::where('equal_id', $equalid)->where('id', '!=', $fasilitas->id)->update(['thumb_image' => $data['thumb_image']]);
                }
            } else {
                $data = $request->only('title', 'short_description', 'conten', 'meta_title', 'meta_keyword', 'meta_description');
            }
            $data['slug'] = str_slug($request->title);

            $fasilitas->update($data);
            if ($request->lang == config('app.default_locale')) {
                Article::where('equal_id', $equalid)->where('id', '!=', $fasilitas->id)->update(['published' => $request->published]);
            }
            \Session::flash('notification', ['level' => 'success', 'message' => 'Article fasilitas '.$fasilitas->title . ' updated.']);
            return redirect()->route('config.fasilitas.index');
        } else {
            return back()->withErrors($validator, $request->lang);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($equalid)
    {
        $fasilitas = Article::where('equal_id', $equalid)->groupBy('thumb_image')->pluck('thumb_image');
        foreach ($fasilitas as $fs) {
            if ($fs !== '') {
                $myimage = new MyImage();
                $myimage->deleteImage($fs);
            }
        }

        foreach (Article::where('equal_id', $equalid)->get() as $fsl) {
            $himages = $fsl->images()->where('type', 'page-header')->groupBy('image')->get();
            $himagesid = $fsl->images()->where('type', 'page-header')->pluck('id');
            foreach ($himages as $hi) {
                if ($hi->image !== '') {
                    $myimage = new MyImage();
                    $myimage->deleteImage($hi->image);
                }
            }
            Images::whereIn('id', $himagesid)->delete();
        }

        Article::where('equal_id', $equalid)->delete();
        \Session::flash('notification', ['level' => 'success', 'message' => 'Fasilitas deleted.']);
        return redirect()->route('config.fasilitas.index');
    }
}
