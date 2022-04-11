@extends('layouts.dashboard')

@section('content')
<div class="container">
    @if(session()->has('error'))
    <div class="alert alert-error alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        {{session()->get('error')}}
    </div>
    @endif
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="/assets/vendors/images/banner-img.png" alt="">
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Welcome back <div class="weight-600 font-30 text-blue">{{auth()->user()->name}}</div>
                </h4>
                <p class="font-18 max-width-600">{{auth()->user()->email}}</p>
            </div>
        </div>
    </div>
    @if(auth()->user()->user_role !=="User")
    <div class="row">
        @if(in_array(Auth::user()->user_role, ['Admin', 'Super Admin']))
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <a href="{{route('admin.supervisors.index')}}" class="btn btn-sm btn-primary w-100">Supervisors</a>
                </div>
            </div>
        </div>
        @endif
        @if(in_array(Auth::user()->user_role, ['Admin', 'Super Admin', 'Ilo']))
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <a href="{{route('admin.attachments.index')}}" class="btn btn-sm btn-danger w-100">Received Attachments ({{App\Models\AttachmentApplication::count()}})</a>
                </div>
            </div>
        </div>
        @endif
        @if(in_array(Auth::user()->user_role, ['Admin', 'Super Admin']))
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <a href="{{route('admin.allocate_supervisor_student')}}" class="btn btn-sm btn-success w-100">Allocate Supervisors</a>
                </div>
            </div>
        </div>
        @endif
        @if(in_array(Auth::user()->user_role, ['Admin', 'Super Admin', 'Hod']))
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <a href="{{route('admin.users.index')}}" class="btn btn-sm btn-info w-100">Students ({{App\Models\Student::count()}})</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <a href="{{route('admin.course.create')}}" class="btn font-weight-bold btn-sm btn-danger w-100">Add Course</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <a href="{{route('admin.bulk_import')}}" class="btn btn-sm btn-success w-100">Import Students</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <a href="{{route('admin.course.index')}}" class="btn font-weight-bold btn-sm btn-warning w-100">View Courses ({{App\Models\Course::count()}})</a>
                </div>
            </div>
        </div>
        @endif
    </div>
    @else
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card-box height-100-p widget-style1">
                <button type="button" class="btn btn-outline-primary">Update Profile</button>
                <button type="button" class="btn btn-outline-info">Submit Attachment Details</button>
            </div>
        </div>


    </div>
    @endif
</div>
@endsection

@section('scripts')
<script src="/assets/vendors/scripts/process.js"></script>
<script src="/assets/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="/assets/vendors/scripts/dashboard.js"></script>
@endsection