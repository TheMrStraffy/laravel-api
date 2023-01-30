<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $projects = Project::with(['type','technologies'])->orderBy('id','desc')->paginate(10);
        return response()->json(compact('projects'));
    }

    public function show($slug){
        $project = Project::where('slug',$slug)->with(['type','technologies'])->first();
        return response()->json($project);
    }

}
//Project::with(['tags','category','user']->orderBy('id','desc')->paginate(10))
