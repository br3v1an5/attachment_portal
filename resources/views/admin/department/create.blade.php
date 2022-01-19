@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
    <form>
        <div class="form-group">
            <label for="name">Department Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="data_info">
            <small id="data_info" class="text-muted">Department Name</small>
        </div>
        <div class="form-group">
            <label for="initials">Initials</label>
            <input type="text" name="initials" id="initials" class="form-control" placeholder="SIK-345" aria-describedby="initials_help">
            <small id="initials_help" class="text-muted">Department Short name or initials</small>
        </div>
        <button type="submit" class="btn btn-success">Create Department</button>
    </form>
</div>
@endsection