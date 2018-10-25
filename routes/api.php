<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/flights', function(Request $request){
    
    $client = new Client([
        'headers'  => [
            'content-type' => 'application/json',
            'Accept' => 'application/json',
        ],
        ]);
        
        if($request->loc && $request->id && $request->arr){
            $response = $client->request('GET', 'https://fids.angkasapura-airports.com/flights/'.$request->loc.'/indo='.$request->id.'/arrdep='.$request->arr);
            return $response->getBody()->getContents();
        }
        
    })->name('api.flights');
    
    Route::get('/airports', function(Request $request){
        $client = new Client([
            'headers'  => [
                'content-type' => 'application/json',
                'Accept' => 'application/json',
            ],
            ]);
            
            $response = $client->request('GET', 'https://fids.angkasapura-airports.com/airports');
            return $response->getBody()->getContents();
            
        })->name('api.airports');
        