@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Adding Comments to a Task</div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h6>Project: {{$task->project->name}}</h6>
                            <h6>Name of the Task: {{ $task->name }}</h6>
                            <h6>Description of the Task: {{ $task->description }}</h6>
                        </div>
                        <div>
                            <form method="POST" action="{{ url('/comment') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                                    <textarea class="form-control" name="body" placeholder="Add a comment" required></textarea>
                                    <br>
                                    <input class="mb-1" type="file" id="image" class="form-control" name="image">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Add Comment</button>
                            </form>
                        </div>
                        @if($task->comments->count() > 0)
                        <hr>
                    <h4>Display Comments</h4>
                    @include('partials.comment_replies', ['comments' => $task->comments, 'task_id' => $task->id])
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
