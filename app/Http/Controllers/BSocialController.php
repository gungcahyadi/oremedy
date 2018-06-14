<?php

namespace App\Http\Controllers;

use App\SocialLink;
use Illuminate\Http\Request;

class BSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = SocialLink::get();
        return view('admin.sociallink.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sociallink.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'platform' => 'required|in:'.implode(",", SocialLink::allowedPlatform()),
            'icon' => 'sometimes|required',
            'type' => 'required',
            'link' => 'required|url',
            'published' => 'required|in:1,0'
        ]);

        $data = $request->all();
        $social = SocialLink::create($data);
        \Session::flash('notification', ['level' => 'success', 'message' => 'Social link for platform '.$social->human_platform . ' saved.']);
        return redirect()->route('social-link.index');
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
    public function edit($id)
    {
        $social = SocialLink::where('id', $id)->firstOrFail();
        return view('admin.sociallink.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $social = SocialLink::where('id', $id)->firstOrFail();

        $this->validate($request, [
            'platform' => 'required|in:'.implode(",", SocialLink::allowedPlatform()),
            'icon' => 'sometimes|required',
            'type' => 'required',
            'link' => 'required|url',
            'published' => 'required|in:1,0'
        ]);
        $data = $request->all();
        $social->update($data);
        \Session::flash('notification', ['level' => 'success', 'message' => 'Social link form platform  '.$social->human_platform . ' updated.']);
        return redirect()->route('social-link.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SocialLink::where('id', $id)->firstOrFail()->delete();
        \Session::flash('notification', ['level' => 'success', 'message' => 'Social link deleted.']);
        return redirect()->route('social-link.index');
    }
}
