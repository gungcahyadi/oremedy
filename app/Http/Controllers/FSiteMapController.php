<?php

namespace App\Http\Controllers;
use App\Services\SiteMap;
use Illuminate\Http\Request;

class FSiteMapController extends Controller
{
    public function siteMapRobot(SiteMap $siteMap) {
        $map = $siteMap->getSiteMap();

        return response($map)
            ->header('Content-type', 'text/xml');
    }
}
