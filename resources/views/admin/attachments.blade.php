@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
<div id="table">
    <div class="adv-table">
        <table class="table table-striped  dt-responsive" id="thisTable">
            <thead class="thead-inverse">
                <tr>
                    <th></th>
                    <th>FULL NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>Date Of Birth</th>
                    <th>Department</th>
                    <th>Class</th>
                    <th>Alternative Phone</th>
                    <th>Attached Department</th>
                    <th>Org Email</th>
                    <th>Insured</th>
                    <th>Org Name</th>
                    <th>Start Date</th>
                    <th>Completion Date</th>
                    <th>Remark</th>
                    <th>Town</th>
                    <th>Map</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attachments as $attachment)
                <tr>
                    <td></td>
                    <td>{{$attachment->student->user->name}}</td>
                    <td>{{$attachment->student->user->email}}</td>
                    <td>{{$attachment->student->phone_number}}</td>
                    <td>{{$attachment->student->dob}}</td>
                    <td>{{$attachment->student->department}}</td>
                    <td>{{$attachment->student->sel_class}}</td>
                    <td>{{$attachment->student->alt_phone}}</td>
                    <td>{{$attachment->attached_dep}}</td>
                    <td>{{$attachment->org_email}}</td>
                    <td>{{$attachment->insurance}}</td>
                    <td>{{$attachment->org_name}}</td>
                    <td>{{$attachment->start_date}}</td>
                    <td>{{$attachment->completion_date}}</td>
                    <td>{{$attachment->remark}}</td>
                    <td>{{$attachment->town}}</td>
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