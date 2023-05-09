<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get the authenticated user's ID
        $user_id = auth()->id();
        // Fetch the user's uploaded content from the database
        $tasks = Task::where('users_id', $user_id)->get();
        $project = Project::where('user_id', $user_id)->get();
        $comment = Comment::where('user_id', $user_id)->get();
        return view('home',compact('project','tasks','comment'));
    }
}
