@extends('layouts.dashboard')
@section('styles')

@endsection

@section('content')

@if($departments->count() == 0)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Error</strong> Please Add Departments First by <a class="text-info" href="{{route('admin.department.create')}}">clicking here</a>
</div>
@endif
@if($courses->count() ==0)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Error</strong> Please Add Courses First by <a class="text-info" href="{{route('admin.course.create')}}">clicking here</a>
</div>
@endif

<h5>Personal Information</h5>
<div id="message_div"></div>
<form id="supervisor_form">
    <section>
        <div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name :</label>
                        <input type="text" class="form-control" required id="firstname" name="firstname">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name :</label>
                        <input type="text" class="form-control" required id="lastname" name="lastname">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Address :</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Assessor Phone Number:</label>
                        <input type="text" class="form-control" required id="phone_number" name="phone_number">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Department :</label>
                        <select class="custom-select form-control" required id="department">
                            <option value="" disabled>Select Department</option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Assessor Alternative Phone Number :</label>
                        <input type="text" class="form-control" data-required id="alt_phone" name="alt_phone" required>
                    </div>
                </div>
            </div>

        </div>
    </section>
</form>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-sm btn-success float-right" id="submit">
            Submit
        </button>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/supervisor.js"></script>
@endsection