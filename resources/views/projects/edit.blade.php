@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/project/update/{{$project->id}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-3">
              <label for="name">Name</label>
              <input type="text" value="{{$project->name}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name of the project" required>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </div>
          </div>
      </form>
</div>
@endsection
