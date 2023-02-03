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
        $technologies = Technology::all();
        $types = Type::all();
        return response()->json(compact('projects','technologies','types'));
    }

    public function show($slug){
        $project = Project::where('slug',$slug)->with(['type','technologies'])->first();


        return response()->json($project);
    }

    public function search(){
        $searchInput = $_GET['searchInput'];

        $projects = Project::where('name','like',"%$searchInput%")->with(['type','technologies'])->get();

        return response()->json($projects);
    }

    public function searchByType(){
        $getTypeId = $_GET['type_id'];
        $projects = Project::where('type_id', $getTypeId)->with(['technologies','user','type'])->get();
        return response()->json(compact('projects'));
    }

    public function searchByTechnology($id){
        $list_projects = [];
        $type = Type::where('id',$id)->with(['projects'])->first();
        foreach($type->projects as $project){
            $list_projects[] = Project::where('id',$type->id)->with(['technologies','user','types'])->first();
        }
        return response()->json($list_projects);
    }

}
//Project::with(['tags','category','user']->orderBy('id','desc')->paginate(10))
