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
    <h4 class="h4">EDIT Department</h4>
    <form method="post" action="{{route('admin.department.update', $department->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Department Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $department->name}}" placeholder="" aria-describedby="data_info">
            <small id="data_info" class="text-muted">Department Name</small>
        </div>
        <div class="form-group">
            <label for="initials">Initials</label>
            <input type="text" name="initials" id="initials" class="form-control" value="{{old('initials') ?? $department->initials}}" placeholder="SIK-345" aria-describedby="initials_help">
            <small id="initials_help" class="text-muted">Department Short name or initials</small>
        </div>
        <button type="submit" class="btn btn-success">Update Department</button>
    </form>
</div>
@endsection