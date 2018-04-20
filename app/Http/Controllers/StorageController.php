<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Response;

class StorageController extends Controller
{
    public function setstorage($folder, $filename) {
        $path = storage_path('app' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR .  $filename);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
