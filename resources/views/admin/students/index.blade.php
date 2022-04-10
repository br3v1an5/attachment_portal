@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@if($students->count() > 0)
<div class="row justify-content-center">
    <div class="col-md-3">
        <a class="btn btn-success" href="{{route('admin.reports.pdfs.student_course', $course->id)}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </a>
    </div>
    <div class="col-md-3">
        <a class="btn btn-info" href="{{route('admin.reports.xlxs.student_course', $course->id)}}"><i class=" fa fa-file-excel-o" aria-hidden="true"></i>XLXS </a>
    </div>
</div>
@endif
<div id="table">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">ZIWA TTI</h3>
            <h3 class="text-center">{{$course->name}} Student List</h3>
        </div>
    </div>
    <div class="adv-table">
        <table class="table table-striped  dt-responsive" id="thisTable">
            <thead class="thead-inverse">
                <tr>
                    <th></th>
                    <th>Names</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date Of Birth</th>
                    <th>Department</th>
                    <th>Reg Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td></td>
                    <td>{{$student->user->name}}</td>
                    <td>{{$student->user->email}}</td>
                    <td>{{$student->phone_number}}</td>
                    <td>{{$student->dob}}</td>
                    <td>{{$student->department ? $student->department->name : ''}}</td>
                    <td>{{$student->user->username}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $('#thisTable').DataTable();
</script>
@endsection