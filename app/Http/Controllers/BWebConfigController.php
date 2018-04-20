<?php

namespace App\Http\Controllers;

use App\WebConfig;
use Illuminate\Http\Request;

class BWebConfigController extends Controller
{
    public function index() {
        $configs = WebConfig::all();
        return view('admin.config.index', compact('configs'));
    }

    public function update(Request $request) {
        $this->validate($request, [
            'fasilitas_pagination' => 'sometimes|required|integer',
        ]);
        $configs = WebConfig::all();

        if ($request->has('fasilitas_pagination')) {
            $eventcfg = $configs->where('config_name', 'fasilitas_pagination')->first();
            $eventcfg->update(['value' => $request->fasilitas_pagination]);
        }
        \Session::flash('notification', ['level' => 'success', 'message' => 'Configuration updated.']);
        return back();
    }

    public function filemanager() {
        return view('admin.config.filemanager');
    }
}
