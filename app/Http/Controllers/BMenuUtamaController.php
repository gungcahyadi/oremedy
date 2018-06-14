<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BMenuUtamaController extends Controller
{
    public function index() {
        $bmenus = Article::where('admin_config', '1')->where('published', '1')->where('lang', config('app.default_locale'))->select('id','title','link', 'slug', 'parent_id', 'more_config', 'equal_id')->orderBy('id')->get();
        $no = 1;
        $menuconfig = $this->menuConfig();
        return view('admin.webconfig.index', compact('bmenus', 'no', 'onpages', 'menuconfig'));
    }

    public function edit($equalid) {
        $article = Article::where('admin_config', '1')->where('equal_id', $equalid)->where('published', '1')->get();
        return view('admin.webconfig.edit', compact('article'));
    }

    public function update(Request $request, $equalid) {
        $article = Article::where('admin_config', '1')->where('equal_id', $equalid)->where('published', '1')->where('lang', $request->lang)->firstOrFail();
        $rowRules = [
            'title' => 'required',
            'short_description' => 'sometimes|required',
            'conten' => 'required',
            'link_video' => 'sometimes|required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'longitude' => 'sometimes|required',
            'latitude' => 'sometimes|required',
            'lang' => 'required|in:'.implode(',', config('app.all_langs'))
        ];

        $validator = \Validator::make($request->toArray(), $rowRules);
        if ($validator->passes()) {
            $data = $request->only('title', 'conten', 'meta_title', 'meta_keyword', 'meta_description', 'longitude', 'latitude');
            if ($request->has(['short_description'])) {
                $data['short_description'] = $request->short_description;
            }
            if ($request->has(['link_video'])) {
                $data['link_video'] = $request->link_video;
            }
            if ($request->longitude !== '' && $request->latitude !== '') {
                if ($request->longitude !== $article->longitude || $request->latitude !== $article->latitude) {
                    Article::where('equal_id', $equalid)->where('id', '!=', $article->id)->update(['longitude' => $request->longitude, 'latitude' => $request->latitude]);
                }
            }
            $article->update($data);
            \Session::flash('notification', ['level' => 'success', 'message' => 'Article  '.$article->title . ' updated.']);
            return redirect()->route('menu-utama.index');
        } else {
            return back()->withErrors($validator, $request->lang);
        }
    }

    public function menuConfig() {
        $lang = config('app.default_locale');
        return [
            '/' => [
                ['type' => 'image', 'tooltip' => 'Home Slider', 'link' => 'homeslider'],
            ],
            \Lang::get('route.product',[], $lang) => [['type' => 'data', 'tooltip' => 'Product', 'link' => 'product']],
            \Lang::get('route.about',[], $lang) => [
                ['type' => 'image', 'tooltip' => 'Team', 'link' => 'team'],
                ['type' => 'onpage', 'tooltip' => 'Kenapa memilih kami', 'link' => 'onpage-about']
            ],
            \Lang::get('route.blog',[], $lang) => [['type' => 'data', 'tooltip' => 'Blog', 'link' => 'blog']],
            \Lang::get('route.contact',[], $lang) => [
                ['type' => 'onpage', 'tooltip' => 'Description Inside the Page', 'link' => 'onpage-contact'],
                ['type' => 'image', 'tooltip' => 'Icon Chat', 'link' => 'icon']
            ],
        ];
    }
}
