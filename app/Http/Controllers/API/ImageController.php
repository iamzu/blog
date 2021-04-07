<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $bingUrl = 'http://cn.bing.com/';
    protected $bing = '/HPImageArchive.aspx?format=js&idx=0&n=1';

    //
    public function bing(Client $client)
    {
        $response = $client->request('POST', $this->bingUrl . trim($this->bing, '/'), ['headers' => [
            'Content-Type' => 'application/json'
        ]]);
        if ($response->getStatusCode() === 200) {
            $content = json_decode($response->getBody()->getContents(), true);
            if (isset($content['images'], $content['images'][0], $content['images'][0]['url']) && !empty($content['images'][0]['url'])) {
                $url = $content['images'][0]['url'];
                return response()->redirectGuest($this->bingUrl . trim($url, '/'));
            }
        }
        return response()->file(public_path('img//default.jpg'), ['Content-Type' => 'image']);
    }
}
