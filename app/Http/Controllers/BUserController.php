<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class BUserController extends Controller
{
    public function password() {
        return view('admin.user.password');
    }

    public function updatepassword(Request $request) {
        $this->validate($request, [
            'oldpassword' => 'required|min:6',
            'newpassword' => 'required|min:6|confirmed',
        ]);

        $user = User::findOrFail(\Auth::user()->id);

        if (\Hash::check($request->oldpassword, $user->password)) {
            $user->password = \Hash::make($request->newpassword);
            $user->save();

            \Session::flash('notification', ['level' => 'success', 'message' => 'Password updated.']);
            \Auth::logout();
            return redirect('/login');
        }

        \Session::flash('notification', ['level' => 'success', 'message' => 'Your old password not match in our record.']);
        return back();
    }
}
