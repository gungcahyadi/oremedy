<?php

namespace App\Http\Controllers;

use App\Article;
use App\Images;
use App\Services\MyImage;
use Illuminate\Http\Request;

class BHeaderImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($parent_id) {
        $deflang = config('app.default_locale');
        $article = Article::where('equal_id', $parent_id)->where('lang', $deflang)->firstOrFail();
        if ($article->link == \Lang::get('route.program',[], $deflang) || $article->link == \Lang::get('route.fasilitas',[], $deflang)) {
            $headerimages = $article->images()->where('type', 'page-header')->where('lang', $deflang)->get();
        }

        if ($article->link == \Lang::get('route.program',[], $deflang)) {
            $parentarticle = Article::where('link', \Lang::get('route.program',[], $deflang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $deflang)->firstOrFail();
        } elseif ($article->link == \Lang::get('route.fasilitas',[], $deflang)) {
            $parentarticle = Article::where('link', \Lang::get('route.fasilitas',[], $deflang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $deflang)->firstOrFail();
        }
        return view('admin.webconfig.header-image.index', compact('article', 'headerimages', 'parentarticle', 'deflang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($parent_id)
    {
        $deflang = config('app.default_locale');
        $article = Article::where('equal_id', $parent_id)->where('lang', $deflang)->firstOrFail();
        if ($article->link == \Lang::get('route.program',[], $deflang)) {
            $parentarticle = Article::where('link', \Lang::get('route.program',[], $deflang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $deflang)->firstOrFail();
        } elseif ($article->link == \Lang::get('route.fasilitas',[], $deflang)) {
            $parentarticle = Article::where('link', \Lang::get('route.fasilitas',[], $deflang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $deflang)->firstOrFail();
        }
        return view('admin.webconfig.header-image.create', compact('article', 'parentarticle', 'deflang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($parent_id, Request $request)
    {
        $alllangs = config('app.all_langs');
        $deflang = config('app.default_locale');
        $eqid = uniqid('IMG', true);

        $rowRules = ['image' => 'required|mimes:jpeg,png|max:1024'];
        foreach($alllangs as $lang) {
            $langRules = [
                'name_'.$lang => 'required',
            ];
        }
        $rowRules = array_merge($rowRules, $langRules);
        $this->validate($request, $rowRules);

        foreach($alllangs as $lang) {
            ${'article_'.$lang} = Article::where('equal_id', $parent_id)->where('lang', $lang)->first();
            $data = [];
            $data['name'] = $request->{'name_'.$lang};
            $data['article_id'] = ${'article_'.$lang}->id;
            $data['type'] = 'page-header';
            $data['lang'] = $lang;
            $data['equal_id'] = $eqid;

            if ($deflang == $lang) {
                if ($request->hasFile('image')){
                    $myimage = new MyImage();
                    $data['image'] = $myimage->saveImage($request->file('image'), $request->{'name_'.$lang});
                }
            } else {
                $data['image'] = ${'image_'.$deflang}->image;
            }

            ${'image_'.$lang} = Images::create($data);
        }

        \Session::flash('notification', ['level' => 'success', 'message' => 'Header image of '.${'article_'.$deflang}->title.' saved.']);
        return redirect()->route('config.headerimage.index', ${'article_'.$deflang}->equal_id);
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
        $deflang = config('app.default_locale');
        $image = Images::where('type', 'page-header')->where('equal_id', $equalid)->get();
        $article = Article::where('id', $image->where('lang', $deflang)->first()->article_id)->where('lang', $deflang)->firstOrFail();
        if ($article->link == \Lang::get('route.program',[], $deflang)) {
            $parentarticle = Article::where('link', \Lang::get('route.program',[], $deflang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $deflang)->firstOrFail();
        } elseif ($article->link == \Lang::get('route.fasilitas',[], $deflang)) {
            $parentarticle = Article::where('link', \Lang::get('route.fasilitas',[], $deflang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $deflang)->firstOrFail();
        }
        return view('admin.webconfig.header-image.edit', compact('article', 'image', 'parentarticle', 'deflang'));
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
        $images = Images::where('type', 'page-header')->where('equal_id', $equalid)->get();
        $alllangs = config('app.all_langs');
        $deflang = config('app.default_locale');

        $rowRules = ['image' => 'mimes:jpeg,png|max:1024'];
        foreach($alllangs as $lang) {
            $langRules = [
                'name_'.$lang => 'required',
            ];
        }
        $rowRules = array_merge($rowRules, $langRules);

        $this->validate($request, $rowRules);

        foreach($alllangs as $lang) {
            ${'image_'.$lang} = $images->where('lang', $lang)->first();
            $data = [];
            $data['name'] = $request->{'name_'.$lang};
            if($lang == $deflang) {
                if ($request->hasFile('image')) {
                    $myimage = new MyImage();
                    if (${'image_'.$lang}->image != '') {
                        $myimage->deleteImage(${'image_'.$lang}->image);
                    }
                    $data['image'] = $myimage->saveImage($request->file('image'), $request->{'name_'.$lang});
                }
            } else {
                $data['image'] = ${'image_'.$deflang}->image;
            }
            ${'image_'.$lang}->update($data);
        }

        \Session::flash('notification', ['level' => 'success', 'message' => 'Image  '.${'image_'.$deflang}->name. ' updated.']);
        return redirect()->route('config.headerimage.index', ${'image_'.$deflang}->article->equal_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($equalid)
    {
        $defart = Images::where('equal_id', $equalid)->where('lang', config('app.default_locale'))->first()->article;
        $articleid = $defart->equal_id;

        $images = Images::where('equal_id', $equalid)->groupBy('image')->pluck('image');
        foreach ($images as $image) {
            if ($image !== '') {
                $myimage = new MyImage();
                $myimage->deleteImage($image);
            }
        }

        Images::where('equal_id', $equalid)->delete();
        \Session::flash('notification', ['level' => 'success', 'message' => 'Header image deleted.']);
        return redirect()->route('config.headerimage.index', $articleid);
    }
}
