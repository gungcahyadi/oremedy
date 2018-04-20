<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class BEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::all();
        return view('admin.emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.emails.create');
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
            'name' => 'required|string|max:255|unique:emails,name',
            'email' => 'required|email|unique:emails,email',
            'receipt' => 'required|in:1,0'
        ]);
        $email = Email::create($request->all());
        \Session::flash('notification', ['level' => 'success', 'message' => 'Email '.$request->get('email') . ' saved.']);
        return redirect()->route('email.index');
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
        $iemail = Email::findOrFail($id);
        return view('admin.emails.edit', compact('iemail'));
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
        $email = Email::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:255|unique:emails,name,' . $email->id,
            'email' => 'required|email|unique:emails,email,' . $email->id,
            'receipt' => 'required|in:1,0'
        ]);

        $email->update($request->all());
        \Session::flash('notification', ['level' => 'success', 'message' => 'Email '.$request->get('email') . ' updated.']);
        return redirect()->route('email.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Email::find($id)->delete();
        \Session::flash('notification', ['level' => 'success', 'message' => 'Email deleted.']);
        return redirect()->route('email.index');
    }
}
