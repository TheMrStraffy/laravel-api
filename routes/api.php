<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('movies', function(){
    $isOut = true;
    $movies = [
        "title"=>"Tenet",
        "poster"=>"https://pad.mymovies.it/filmclub/2019/10/296/locandina.jpg",
        "running_time"=>150,
        "directors"=>['Christopher Nolan'],
        "writers"=>['Christopher Nolan'],
        "producers"=>['Christopher Nolan', 'Emma Thomas'],
        "cast"=>[
            'John David Washington',
            'Robert Pattinson',
            'Elizabeth Debicki',
            'Dimple Kapadia',
            'Michael Caine',
            'Kenneth Branagh',
        ],
        ];

        return response()->json(compact('movies','isOut'));
});
Route::namespace('Api')
    ->prefix('posts')
    ->group(function(){
        Route::get('/',[PostController::class, 'index']);
    });
