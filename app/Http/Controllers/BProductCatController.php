<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class BProductCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = Article::where('link', \Lang::get('route.product',[], config('app.default_locale')))->where('position', 'menu-utama')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        return view('admin.webconfig.catproduct.create', compact('article'));
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
        $eqid = uniqid('CAT', true);

        $rowRules = [];
        foreach ($alllangs as $lang) {
            $langRules = [
                'category_'.$lang => 'required'
            ];
            $rowRules = array_merge($rowRules, $langRules);
        }
        $this->validate($request, $rowRules);
        foreach ($alllangs as $lang) {
            $slug = str_replace(' ','-',strtolower($request->{'category_'.$lang}));
            $data = [];
            $data['category'] = $request->{'category_'.$lang};
            $data['type'] = 'product';
            $data['slug'] = $slug;
            $data['lang'] = $lang;
            $data['equal_id'] = $eqid;
            ${'category_'.$lang} = Category::create($data);
        }
        \Session::flash('notification', ['level' => 'success', 'message' => 'Category '.${'category_'.config('app.default_locale')}->category. ' saved.']);
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
        $article = Article::where('link', \Lang::get('route.product',[], config('app.default_locale')))->where('position', 'menu-utama')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        $category = Category::where('type', 'product')->where('equal_id', $equalid)->get();
        return view('admin.webconfig.catproduct.edit', compact('article', 'category'));
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
        $categories = Category::where('type', 'product')->where('equal_id', $equalid)->get();
        $alllangs = config('app.all_langs');

        $rowRules = [];
        foreach ($alllangs as $lang) {
            $langRules = [
                'category_'.$lang => 'required'
            ];
            $rowRules = array_merge($rowRules, $langRules);
        }
        $this->validate($request, $rowRules);
        foreach ($alllangs as $lang) {
            $slug = str_replace(' ','-',strtolower($request->{'category_'.$lang}));
            $data = [];
            $data['category'] = $request->{'category_'.$lang};
            $data['slug'] = $slug;            
            $categories->where('lang', $lang)->first()->update($data);
        }
        \Session::flash('notification', ['level' => 'success', 'message' => 'Category '.$categories->where('lang', config('app.default_locale'))->first()->category. ' updated.']);
        return redirect()->route('config.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($equalid)
    {
        Category::where('type', 'product')->where('equal_id', $equalid)->delete();
        \Session::flash('notification', ['level' => 'success', 'message' => 'Category deleted.']);
        return redirect()->route('config.product.index');
    }
}
