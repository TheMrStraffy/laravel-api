<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $projects = Project::orderBy('id','desc')->paginate(10);
        return view('admin.dashboard', compact('projects'));
    }
}
