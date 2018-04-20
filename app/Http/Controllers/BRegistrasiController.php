<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use Illuminate\Http\Request;

class BRegistrasiController extends Controller
{
    public function index() {
        $dataregistrasi = Pendaftaran::all();
        return view('admin.registrasi.index', compact('dataregistrasi'));
    }

    public function destroy($id)
    {
        Pendaftaran::find($id)->delete();
        \Session::flash('notification', ['level' => 'success', 'message' => 'Registration data deleted.']);
        return redirect()->route('data-registrasi.index');
    }

    public function confirm(Request $request) {
        $this->validate($request, [
            'register_id' => 'required|exists:pendaftaran,id'
        ]);
        $pendaftaran = Pendaftaran::findOrFail($request->register_id);
        $pendaftaran->update(['status' => 'confirmed']);
        \Session::flash('notification', ['level' => 'success', 'message' => 'Registration data mark as confirmed.']);
        return redirect()->route('data-registrasi.index');
    }
}
