@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in as ')}}{{auth()->user()->name}}
                </div>
            </div>
        </div>
    </div>
    <br>
      <a class="btn btn-primary mt-2" href="{{route('project.create')}}">Create a Project</a>
      <a class="btn btn-success mt-2" href="{{route('task.index')}}">Create Task for the project</a>
      <br><br>
    <h2>Table for Projects</h2>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th>Task Assigned</th>
            <th>Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($project as $p)
          <tr>
            <td>{{$p->name}}</td>
            <td>@foreach ($p->tasks as $task)
                {{ $task->name }}<br>
            @endforeach</td>
            <td>@foreach ($p->tasks as $task)
                {{ $task->status }}<br>
            @endforeach</td>
            <td>
                <div>
                    <a href="{{url('/project/edit/'.$p->id)}}" class="p-2 btn btn-sm btn-success">Edit</a>
                    <a href="{{url('/project/delete/'.$p->id)}}" class="p-2 btn btn-sm btn-danger">Delete</a>
                </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <br><br>
      <h2>Table for Tasks</h2>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th>Description</th>
            <th>Deadline</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $p)
          <tr>
            <td>{{$p->name}}</td>
            <td>{{$p->description}}</td>
            <td>{{$p->deadline}}</td>
            <td>
                <div>
                    <a href="{{url('/task/edit/'.$p->id)}}" class="p-2 btn btn-sm btn-success">Edit</a>
                    <a href="{{url('/task/delete/'.$p->id)}}" class="p-2 btn btn-sm btn-danger">Delete</a>
                    <a class="btn btn-secondary" href="{{url('/comment/'.$p->id)}}">Create Comments</a>
                </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <br><br>
      <h2>Table for Comments</h2>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th scope="col">Body</th>
            <th>Commentable Model</th>
            <th>Parent Id</th>
            <th>Image</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($comment as $p)
          <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->body}}</td>
            <td>{{$p->commentable_type}}</td>
            <td>{{$p->parent_id ? $p->parent_id : 'no parent'}}</td>
            <td><img src="/storage/{{$p->image}}" width="100" height="100" alt="No image inserted"></td>
            <td>
                <div>
                    <a href="{{url('/comment/delete/'.$p->id)}}" class="p-2 btn btn-sm btn-danger">Delete</a>
                </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection
