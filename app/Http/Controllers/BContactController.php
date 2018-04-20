<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use Illuminate\Http\Request;

class BContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = ContactMessage::all();
        return view('admin.contactus.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContactMessage::find($id)->delete();
        \Session::flash('notification', ['level' => 'success', 'message' => 'Messages deleted.']);
        return redirect()->route('contact-messages.index');
    }

    public function confirm(Request $request) {
        $this->validate($request, [
            'contact_id' => 'required|exists:contact_messages,id'
        ]);
        $contactmes = ContactMessage::findOrFail($request->contact_id);
        $contactmes->update(['status' => 'confirmed']);
        \Session::flash('notification', ['level' => 'success', 'message' => 'Messages mark as confirmed.']);
        return redirect()->route('contact-messages.index');
    }
}
