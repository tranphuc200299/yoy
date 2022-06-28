<?php

namespace App\Http\Controllers;

use GuzzleHttp\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use function GuzzleHttp\Promise\all;

class HomePageController extends Controller
{
    public function index()
    {
        return view('client.modal.modal-home-page');
    }

    public function showDropFile(Request $request)
    {
        return view('client.modal.modal-drop-file');
    }

    public function handleDropFile(Request $request)
    {
        $request->validate([
            'file' => ['required'],
        ]);
        $data = $request->all();

        return view('client.modal.modal-automatic-collation',compact('data'));
    }

    public function showModalCompare(Request $request)
    {
        $data = $request->all();
        return view('client.modal.end-of-comparison');
    }

    public function handlerCompare(Request $request)
    {
        $file = $request->file('file');
        $data  = $request->all();
        return view('client.modal.end-of-comparison');
    }

}
