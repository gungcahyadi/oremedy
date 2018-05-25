<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Services\MyImage;
use Illuminate\Http\Request;
use App\Images;

class BProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::where('link', \Lang::get('route.product',[], config('app.default_locale')))->where('more_config', '1')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        $categories = Category::where('type', 'product')->where('lang', config('app.default_locale'))->get();
        $allproduct = Article::where('link', \Lang::get('route.product',[], config('app.default_locale')))->where('position', 'product')->where('slug', '!=', '')->where('lang', config('app.default_locale'))->get();
        return view('admin.webconfig.product.index', compact('article','categories', 'allproduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = Article::where('link', \Lang::get('route.product',[], config('app.default_locale')))->where('more_config', '1')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        return view('admin.webconfig.product.create', compact('article'));
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

        $rowRules = [
            'categories' => 'required'
        ];
        foreach($alllangs as $lang) {
            if ($lang == config('app.default_locale')) {
                $langRules = [
                    'title_'.$lang => 'required',
                    'price_'.$lang => 'required',                    
                    'short_description_'.$lang => 'required',
                    'conten_'.$lang => 'required',
                    'meta_title_'.$lang => 'required',
                    'meta_keyword_'.$lang => 'required',
                    'meta_description_'.$lang => 'required',
                    'published' => 'required|in:1,0',
                    'thumb_image' => 'required|mimes:jpeg,png|max:1024',
                ];
            } else {
                $langRules = [
                    'title_'.$lang => 'required',
                    'price_'.$lang => 'required',                    
                    'short_description_'.$lang => 'required',
                    'conten_'.$lang => 'required',
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
            $data['price'] = $request->{'price_'.$lang};            
            $data['short_description'] = $request->{'short_description_'.$lang};
            $data['conten'] = $request->{'conten_'.$lang};
            $data['type'] = 'product';
            $data['meta_title'] = $request->{'meta_title_'.$lang};
            $data['meta_keyword'] = $request->{'meta_keyword_'.$lang};
            $data['meta_description'] = $request->{'meta_description_'.$lang};
            $data['slug'] = str_slug($request->{'title_'.$lang});
            $data['position'] = 'product';
            $data['link'] = \Lang::get('route.product',[], $lang);
            $data['lang'] = $lang;
            $data['equal_id'] = $eqid;
            $data['published'] = $request->published;
            $data['parent_id'] = Article::where('link', \Lang::get('route.product',[], $lang))->where('more_config', '1')->where('published', '1')->where('lang', $lang)->first()->id;

            if ($lang == config('app.default_locale')) {
                if ($request->hasFile('thumb_image')) {
                    $myimage = new MyImage();
                    $data['thumb_image'] = $myimage->saveImage($request->file('thumb_image'), $request->{'title_'.$lang});
                }
            } else {
                $data['thumb_image'] = ${'fs_'.$deflang}->thumb_image;
            }
            ${'fs_'.$lang} = Article::create($data);
            if ($lang == $deflang) {
                ${'fs_'.$lang}->categories()->sync($request->categories);
            } else {
                $equalcat = Category::whereIn('id', $request->categories)->pluck('equal_id');
                $altcat = Category::whereIn('equal_id', $equalcat)->where('lang', $lang)->pluck('id');
                ${'fs_'.$lang}->categories()->sync($altcat->toArray());
            }
        }

        \Session::flash('notification', ['level' => 'success', 'message' => 'Article product '.${'fs_'.$deflang}->title.' saved.']);
        return redirect()->route('config.product.index');
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
        $article = Article::where('link', \Lang::get('route.product',[], config('app.default_locale')))->where('more_config', '1')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        $product = Article::where('slug', '!=', '')->where('equal_id', $equalid)->get();
        return view('admin.webconfig.product.edit', compact('article', 'product'));

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

        $product = Article::where('equal_id', $equalid)->where('lang', $request->lang)->firstOrFail();
        $rowRules = [
            'categories' => 'required'
        ];
        if ($request->lang == config('app.default_locale')) {
            $rowRules = [
                'title' => 'required',
                'price' => 'required',
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
                'price' => 'required',                
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
                $data = $request->only('title','price', 'short_description', 'conten', 'meta_title', 'meta_keyword', 'meta_description', 'published');
                if ($request->hasFile('thumb_image')) {
                    $myimage = new MyImage();
                    if ($product->thumb_image != '') {
                        $myimage->deleteImage($product->thumb_image);
                    }
                    $data['thumb_image'] = $myimage->saveImage($request->file('thumb_image'), $request->title);
                    Article::where('equal_id', $equalid)->where('id', '!=', $product->id)->update(['thumb_image' => $data['thumb_image']]);
                }

                $product->categories()->sync($request->categories);
            } else {
                $data = $request->only('title','price', 'short_description', 'conten', 'meta_title', 'meta_keyword', 'meta_description');
            }
            $data['slug'] = str_slug($request->title);

            $product->update($data);

            if ($request->lang == config('app.default_locale')) {
                Article::where('equal_id', $equalid)->where('id', '!=', $product->id)->update(['published' => $request->published]);

                $equalcat = Category::where('id', $request->categories)->pluck('equal_id');

                $alt_langs = array_diff(config('app.all_langs'), array(config('app.default_locale')));
                foreach ($alt_langs as $altlang) {
                    $altcat = Category::whereIn('equal_id', $equalcat)->where('lang', $altlang)->pluck('id');
                    $altproduk = Article::where('equal_id', $equalid)->where('lang', $altlang)->first();
                    if (!empty($altproduk)) {
                       $altproduk->categories()->sync($altcat->toArray());
                    }
                }
            }
            \Session::flash('notification', ['level' => 'success', 'message' => 'Article Product '.$product->title . ' updated.']);
            return redirect()->route('config.product.index');
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
        $product = Article::where('equal_id', $equalid)->groupBy('thumb_image')->pluck('thumb_image');
        foreach ($product as $fs) {
            if ($fs !== '') {
                $myimage = new MyImage();
                $myimage->deleteImage($fs);
            }
        }

        foreach (Article::where('equal_id', $equalid)->get() as $fsl) {
            $himages = $fsl->images()->where('type', 'product')->groupBy('image')->get();
            $himagesid = $fsl->images()->where('type', 'product')->pluck('id');
            foreach ($himages as $hi) {
                if ($hi->image !== '') {
                    $myimage = new MyImage();
                    $myimage->deleteImage($hi->image);
                }
            }
            Images::whereIn('id', $himagesid)->delete();
        }

        Article::where('equal_id', $equalid)->delete();
        \Session::flash('notification', ['level' => 'success', 'message' => 'product deleted.']);
        return redirect()->route('config.product.index');
    }
}
