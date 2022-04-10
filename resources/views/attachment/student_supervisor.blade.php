@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
<div id="table">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <a class="btn btn-success" href="{{route('admin.reports.pdfs.supervisor_stude')}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </a>
        </div>
        <div class="col-md-3">
            <a class="btn btn-info" href="{{route('admin.reports.xlxs.supervisor_stude')}}"><i class="fa fa-file-excel-o" aria-hidden="true"></i> XLXS </a>

        </div>
    </div>
    <div class="adv-table">
        <table class="table table-striped  dt-responsive" id="thisTable">
            <thead class="thead-inverse">
                <tr>
                    <th></th>
                    <th>FULL NAME</th>
                    <th>Supervisor</th>
                    <th>PHONE</th>
                    <th>Town</th>
                    <th>Department</th>
                    <th>EMAIL</th>
                    <th>Date Of Birth</th>
                    <th>Class</th>
                    <th>Alternative Phone</th>
                    <th>Attached Department</th>
                    <th>Org Email</th>
                    <th>Insured</th>
                    <th>Org Name</th>
                    <th>Start Date</th>
                    <th>Completion Date</th>
                    <th>Remark</th>

                    <th>Map</th>
                </tr>
            </thead>
            <tbody>

                @foreach($students as $student)
                <tr>
                    <td></td>
                    <td>{{$student->user->name}}</td>
                    <td>{{$student->supervisor->user->name}}</td>
                    <td>{{$student->phone_number}}</td>
                    <td>{{$student->attachment_application->town}}</td>
                    <td>{{$student->department ? $student->department->name : '' }}</td>
                    <td>{{$student->user->email}}</td>
                    <td>{{$student->dob}}</td>
                    <td>{{$student->course ? $student->course->name : '' }}</td>
                    <td>{{$student->alt_phone}}</td>
                    <td>{{$student->attachment_application->attached_dep}}</td>
                    <td>{{$student->attachment_application->org_email}}</td>
                    <td>{{$student->attachment_application->insurance}}</td>
                    <td>{{$student->attachment_application->org_name}}</td>
                    <td>{{$student->attachment_application->start_date}}</td>
                    <td>{{$student->attachment_application->completion_date}}</td>
                    <td>{{$student->attachment_application->remark}}</td>

                    <td></td>
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