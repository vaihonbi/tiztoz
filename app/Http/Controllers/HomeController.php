<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function download()
    {
        $url = request()->post('url');

        // Lay HTML
        $response = Http::withHeaders([
            'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko)',
            'cookie' => 'tt_webid_v2=6895635542940894721; tt_webid=6895635542940894721',
        ])->get($url);

        // print_r($response->headers('cookie'));
        // exit;

        $html = $response->body();

        $script = explode('<script id="__NEXT_DATA__" type="application/json" crossorigin="anonymous">', $html);
        $script = explode('</script><script crossorigin="anonymous"', $script[1]);

        $obj = json_decode($script[0]);

        // Lay file MP4
        $downloadUrl = $obj->props->pageProps->itemInfo->itemStruct->video->downloadAddr;
        $response = Http::withHeaders([
            'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko)',
            'referer' => $url,
            'cookie' => 'tt_webid_v2=6895635542940894721; tt_webid=6895635542940894721',
        ])->get($downloadUrl);

        $fileContent = $response->body();

        return response($fileContent)
            ->header('Content-Type', 'video/mp4')
            ->header('Content-disposition', 'attachment; filename=test.mp4');
    }
}
