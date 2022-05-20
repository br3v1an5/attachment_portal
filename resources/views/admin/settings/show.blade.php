@extends('layouts.dashboard')
@section('styles')

@endsection
@section('content')
@if(session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Success</strong> {{session()->get('success')}}
</div>
@endif

<div class="container-fluid">
    <h3 class="h3">Settings</h3>
    <form action="{{route('admin.settings.save')}}" method="post">
        @csrf

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label>Application Deadline</label>
                    <input type="date" class="form-control" name="application_deadline" value="{{$deadline}}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Application Status</label>
                    <select class="form-control" name="application_status" value="{{$application_status}}">
                        <option value="OPEN" @if($application_status=='OPEN' ) selected @endif>OPEN</option>
                        <option value="CLOSED" @if($application_status=='CLOSED' ) selected @endif>CLOSED</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button type="submit" class="btn btn-small btn-info">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')

@endsection