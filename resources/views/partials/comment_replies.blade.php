<!-- _comment_replies.blade.php -->

@foreach($comments as $comment)
<div class="display-comment">
    <p>{{ $comment->body }}</p>
    @if($comment->image)
        <img src="/storage/{{$comment->image}}" width="100" height="100" alt="" class="mb-4">
    @endif
    <a href="" id="reply"></a>
    <form method="post" action="{{ route('reply.add') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" name="body" class="form-control" />
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            <input class="mt-2" type="file" id="imagereply" class="form-control" name="imagereply">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning mt-2" value="Add Nested Comment" />
            <a href="{{url('/comment/delete/'.$comment->id)}}" class="mt-2 btn btn-danger">Delete</a>
        </div>
    </form>
    @include('partials.comment_replies', ['comments' => $comment->replies])
</div>
@endforeach
