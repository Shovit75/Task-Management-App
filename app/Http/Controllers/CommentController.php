<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create($id){
        $task = Task::find($id);
        $comments = Comment::where('commentable_type', 'App\Models\Task')
                       ->where('commentable_id', $task->id)
                       ->orderBy('created_at', 'desc')
                       ->get();
        return view('comments.create',compact('task','comments'));
    }

    public function store(Request $request){
        $comment = new Comment;
        $comment->body = $request['body'];
        $user_id = auth()->id();
        $comment-> user_id = $user_id;
        //for image migrate in profile table
        if($request['image']){
            $imagepath = $request['image']->store('comment','public');
            $comment -> image = $imagepath;
        }
        $task = Task::find($request['task_id']);
        $comment->commentable()->associate($task);
        $comment->save();
        return redirect()->back();
    }

    public function delete($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply -> body = $request['body'];
        $user_id = auth()->id();
        $reply -> user_id = $user_id;
        $reply -> parent_id = $request['parent_id'];
        if($request['imagereply']){
            $imagepath = $request['imagereply']->store('comment','public');
            $reply -> image = $imagepath;
        }
        $task = Task::find($request->get('task_id'));
        $reply -> commentable()->associate($task);
        $reply -> save();
        return back();
    }
}
