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
        $projects = Project::all();
        $technologies = Technology::all();
        $types = Type::all();
        return response()->json(compact('projects','technologies','types'));
    }

}
