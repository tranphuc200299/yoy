<?php

namespace App\Http\Controllers;

//use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use function GuzzleHttp\Promise\all;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class HomePageController extends Controller
{
    public function index()
    {
        return view('client.modal.modal-home-page');
    }

    public function handlerExportFile(Request $request)
    {
        
        $client = new \GuzzleHttp\Client();
        $file = $request->file('file');
        $options = [
            'multipart' => [
                [
                    'name' => 'survey_type',
                    'contents' => $request->survey_type,
                ],
                [
                    'name' => 'file',
                    'contents' => \GuzzleHttp\Psr7\Utils::tryFopen($file->getRealPath(), 'r'),
                    'filename' =>$file->getClientOriginalName(),
                    'headers'  => [
                        'Content-Type' => '<Content-type header>'
                    ]
                ]
            ]];
        $request = new \GuzzleHttp\Psr7\Request('POST', 'http://localhost:8080/highlight');
        $res = $client->sendAsync($request, $options)->wait();
        $fileName = $res->getHeaders()['x-filename'][0];
        dd($res->getBody());
        return Response::download($file->getRealPath(),$fileName, ['Content-Type: application/zip']);

    }

}
