<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $isOut = true;
        $movie = [
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
            "email"=>"themrstraffy@gmail.com",
            ];

            return response()->json(compact('user'));
    }

}
