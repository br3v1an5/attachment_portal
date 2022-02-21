@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Success</strong> {{session()->get('success')}}
    </div>
    @endif
    <h4 class="h4">Edit Course/Class</h4>
    <form method="post" action="{{route('admin.course.update', $course->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Course Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $course->name}}" placeholder="" aria-describedby="data_info">
            <small id="data_info" class="text-muted">Course Name</small>
        </div>
        <div class="form-group">
            <label for="initials">Course Short</label>
            <input type="text" name="short_name" id="initials" value="{{old('short_name') ?? $course->short_name}}" class="form-control" placeholder="SIK-345" aria-describedby="initials_help">
            <small id="initials_help" class="text-muted">Course Short name or initials</small>
        </div>
        <button type="submit" class="btn btn-success">Update Course</button>
    </form>
</div>
@endsection