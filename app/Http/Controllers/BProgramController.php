<?php

namespace App\Http\Controllers;
use App\Article;
use App\Images;
use App\Services\MyImage;
use Illuminate\Http\Request;

class BProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::where('link', \Lang::get('route.program',[], config('app.default_locale')))->where('more_config', '1')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        $allprogram = Article::where('link', \Lang::get('route.program',[], config('app.default_locale')))->where('position', 'program')->where('slug', '!=', '')->where('lang', config('app.default_locale'))->get();
        return view('admin.webconfig.program.index', compact('article', 'allprogram'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = Article::where('link', \Lang::get('route.program',[], config('app.default_locale')))->where('more_config', '1')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        return view('admin.webconfig.program.create', compact('article'));
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
                    'meta_title_'.$lang => 'required',
                    'meta_keyword_'.$lang => 'required',
                    'meta_description_'.$lang => 'required',
                    'published' => 'required|in:1,0',
                ];
            } else {
                $langRules = [
                    'title_'.$lang => 'required',
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
            $data['short_description'] = $request->{'short_description_'.$lang};
            $data['conten'] = $request->{'conten_'.$lang};
            $data['meta_title'] = $request->{'meta_title_'.$lang};
            $data['meta_keyword'] = $request->{'meta_keyword_'.$lang};
            $data['meta_description'] = $request->{'meta_description_'.$lang};
            $data['slug'] = str_slug($request->{'title_'.$lang});
            $data['position'] = 'program';
            $data['link'] = \Lang::get('route.program',[], $lang);
            $data['lang'] = $lang;
            $data['equal_id'] = $eqid;
            $data['published'] = $request->published;
            $data['parent_id'] = Article::where('link', \Lang::get('route.program',[], $lang))->where('more_config', '1')->where('published', '1')->where('lang', $lang)->first()->id;
            ${'prg_'.$lang} = Article::create($data);
        }

        \Session::flash('notification', ['level' => 'success', 'message' => 'Article program '.${'prg_'.$deflang}->title.' saved.']);
        return redirect()->route('config.program.index');
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
        $article = Article::where('link', \Lang::get('route.program',[], config('app.default_locale')))->where('more_config', '1')->where('published', '1')->where('lang', config('app.default_locale'))->firstOrFail();
        $program = Article::where('slug', '!=', '')->where('equal_id', $equalid)->get();
        return view('admin.webconfig.program.edit', compact('article', 'program'));
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
        $program = Article::where('equal_id', $equalid)->where('lang', $request->lang)->firstOrFail();
        if ($request->lang == config('app.default_locale')) {
            $rowRules = [
                'title' => 'required',
                'short_description' => 'required',
                'conten' => 'required',
                'meta_title' => 'required',
                'meta_keyword' => 'required',
                'meta_description' => 'required',
                'published' => 'required|in:1,0',
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
            } else {
                $data = $request->only('title', 'short_description', 'conten', 'meta_title', 'meta_keyword', 'meta_description');
            }
            $data['slug'] = str_slug($request->title);
            $program->update($data);
            if ($request->lang == config('app.default_locale')) {
                Article::where('equal_id', $equalid)->where('id', '!=', $program->id)->update(['published' => $request->published]);
            }
            \Session::flash('notification', ['level' => 'success', 'message' => 'Article program '.$program->title . ' updated.']);
            return redirect()->route('config.program.index');
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
       foreach (Article::where('equal_id', $equalid)->get() as $prg) {
            $himages = $prg->images()->where('type', 'page-header')->groupBy('image')->get();
            $himagesid = $prg->images()->where('type', 'page-header')->pluck('id');
            foreach ($himages as $hi) {
                if ($hi->image !== '') {
                    $myimage = new MyImage();
                    $myimage->deleteImage($hi->image);
                }
            }
            Images::whereIn('id', $himagesid)->delete();
        }

        Article::where('equal_id', $equalid)->delete();
        \Session::flash('notification', ['level' => 'success', 'message' => 'Program deleted.']);
        return redirect()->route('config.program.index');
    }
}
