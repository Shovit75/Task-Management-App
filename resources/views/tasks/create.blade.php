@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create a Task</h2>
    <form action="/task" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-3">
              <label for="name"><strong>Name:</strong></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter the task's name" required>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Enter the task's description" required>
              <label for="deadline">Deadline for the task</label><br>
              <input type="date" id="deadline" name="deadline"><br>
              <label for="status">Status:</label><br>
                <select id="status" name="status">
                    <option value="todo">Todo</option>
                    <option value="in-progress">In-Progress</option>
                    <option value="done">Done</option>
                </select><br>
                <label for="project">Assign Project:</label><br>
                <select id="pid" name="project_id">
                    @foreach ($project as $p)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </div>
          </div>
      </form>
      <br><br>
</div>
@endsection
