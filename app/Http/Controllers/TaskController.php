<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    public function store(Request $request){
        $task = new Task;
        $task -> name = $request['name'];
        $task -> description = $request['description'];
        $task -> deadline = $request['deadline'];
        $task -> status = $request['status'];
        $task -> project_id = $request['project_id'];
        $uid = auth()->id();
        $task -> users_id = $uid;
        $task -> save();
        return redirect('home');
    }

    public function index(Request $request){
        $user_id = auth()->id();
        $project = Project::where('user_id', $user_id)->get();
        return view('tasks.create',compact('project'));
    }

    public function edit($id){
        $task = Task::find($id);
        $user_id = auth()->id();
        $project = Project::where('user_id', $user_id)->get();
        return view('tasks.edit',compact('task','project'));
    }

    public function update(Request $request, $id){
        $task = Task::find($id);
        $task -> name = $request['name'];
        $task -> description = $request['description'];
        $task -> deadline = $request['deadline'];
        $task -> status = $request['status'];
        $task -> project_id = $request['project_id'];
        $task -> save();
        return redirect('home');
    }

    public function delete($id){
        Task::destroy($id);
        return redirect('/home');
    }
}
