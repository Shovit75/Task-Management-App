<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create(){
        return view('projects.create');
    }

    public function store(Request $request){
        $project = new Project;
        $project -> name = $request['name'];
        $uid = auth()->id();
        $project -> user_id = $uid;
        $project -> save();
        return redirect('/home');
    }

    public function edit($id){
        $project = Project::find($id);
        return view('projects.edit',compact('project'));
    }

    public function update(Request $request, $id){
        $project = Project::find($id);
        $project -> name = $request['name'];
        $uid = auth()->id();
        $project -> user_id = $uid;
        $project -> save();
        return redirect('/home');
    }

    public function delete($id){
        Project::destroy($id);
        return redirect('/home');
    }

}
