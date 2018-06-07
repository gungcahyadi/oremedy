<?php

namespace App\Services;

use App\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SiteMap
{
    /**
     * Return the content of the Site Map
     */
    public function getSiteMap()
    {
        if (Cache::has('oremedy-site-map')) {
            return Cache::get('oremedy-site-map');
        }

        $siteMap = $this->buildSiteMap();
        Cache::add('oremedy-site-map', $siteMap, 120);
        return $siteMap;
    }

    /**
     * Build the Site Map
     */
    protected function buildSiteMap()
    {
        $def_lang = config('app.default_locale');
        $alt_langs = config('app.alt_langs');

        $menuUtama = $this->getMenuUtama();
        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?'.'>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';

        foreach ($menuUtama as $mu) {
            if($mu->link == \Lang::get('route.product',[], $def_lang)) {
                $allproduct = Article::where('link', \Lang::get('route.product',[], $def_lang))->where('position', 'product')->where('published', '1')->where('lang', $def_lang)->get();
                foreach($allproduct as $ap) {
                    $alt_ap = Article::where('position', 'product')->where('published', '1')->whereIn('lang', $alt_langs)->where('equal_id', $ap->equal_id)->select('id','title','link', 'slug', 'parent_id', 'equal_id', 'lang', 'updated_at')->get();
                    $xml[] = "  <url>";
                    $xml[] = "    <loc>".url(preg_replace('#/+#','/', $def_lang.'/'.$ap->link.'/'.$ap->slug))."</loc>";
                    foreach ($alt_langs as $alt_lang) {
                        $altap = $alt_ap->where('lang', $alt_lang)->first();
                        if (!empty($altap)) {
                            $urllink = url(preg_replace('#/+#','/', $alt_lang.'/'.$altap->link.'/'.$altap->slug));
                            $xml[] = "    <xhtml:link rel=\"alternate\" hreflang=\"$alt_lang\" href=\"$urllink\"/>";
                        }
                    }
                    $xml[] = "    <lastmod>".date('c', strtotime($ap->updated_at))."</lastmod>";
                    $xml[] = "  </url>";
                }
            } else {
                $xml[] = "  <url>";
                $xml[] = "    <loc>".url(preg_replace('#/+#','/', $def_lang.'/'.$mu->link))."</loc>";
                $alt_mu = Article::where('position', 'menu-utama')->where('published', '1')->whereIn('lang', $alt_langs)->where('equal_id', $mu->equal_id)->select('id','title','link', 'slug', 'parent_id', 'equal_id', 'lang', 'updated_at')->get();
                foreach ($alt_langs as $alt_lang) {
                    $altmu = $alt_mu->where('lang', $alt_lang)->first();
                    if (!empty($altmu)) {
                        $urllink = url(preg_replace('#/+#','/', $alt_lang.'/'.$altmu->link.'/'.$altmu->slug));
                        $xml[] = "    <xhtml:link rel=\"alternate\" hreflang=\"$alt_lang\" href=\"$urllink\"/>";
                    }
                }
                $xml[] = "    <lastmod>".$mu->updated_at."</lastmod>";
                $xml[] = "  </url>";

            }
        }

        $xml[] = '</urlset>';

        return join("\n", $xml);
    }

    /**
     * Return all the posts as $url => $date
     */
    protected function getMenuUtama()
    {
        $def_lang = config('app.default_locale');
        return Article::where('position', 'menu-utama')
        ->where('published', '1')
        ->where('lang', $def_lang)
        ->select('id','title','link', 'slug', 'parent_id', 'equal_id', 'updated_at')
        ->get();
    }
}