<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
  public function index(){
    $project = Project::with(['techonologies', 'type'])->paginate(6);
    return response()->json($project);
  }

  public function show($slug){
    $project = Project::where("slug", $slug)->with(['techonologies', 'type'])->firstOrFail();
    return response()->json($project);
  }
}
