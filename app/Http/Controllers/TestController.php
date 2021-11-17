<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Polda;
use Spatie\Dropbox\Client;
use App\Models\UserHasPolda;
use Illuminate\Http\Request;
use App\Models\RencanaOperasi;
use App\Models\DailyNoticeCurrent;

class TestController extends Controller
{
    public function dropboxFileUpload()
    {
        $client = new Client(env('DROPBOX_AUTH_TOKEN'), env('DROPBOX_APP_SECRET'));
        $file = fopen(public_path('img/polwan.png'), 'rb');
        $size = filesize(public_path('img/polwan.png'));
        $dropboxFileName = '/myphoto4.png';
        $client->uploadFile($dropboxFileName, WriteMode::add(), $file, $size);
        $links['share'] = $client->createShareableLink($dropboxFileName);
        $links['view'] = $client->createTemporaryDirectLink($dropboxFileName);
        print_r($links);

    }

    public function scandir()
    {
        $dir    = storage_path('app/Korlantas-Polri');
        $files  = scandir($dir, 1);
        logger($files);
        return "Done";
    }

    public function downloadBackup()
    {
        $dir    = storage_path('app/Korlantas-Polri');
        $files  = scandir($dir, 1);
        return response()->download($dir."/".$files[0]);
    }
}
