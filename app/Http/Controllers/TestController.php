<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller
{
    public function index()
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = "https://simple-books-api.glitch.me/books";


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('testindex', compact('responseBody'))
            ->with('i');
    }
}
