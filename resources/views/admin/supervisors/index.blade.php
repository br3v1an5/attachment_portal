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
                    <th>Username</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>Date Of Birth</th>
                    <th>Department</th>
                    <th>Class</th>
                    <th>Alternative Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($supervisors as $supervisor)
                <tr>
                    <td></td>
                    <td>{{$supervisor->user->name}}</td>
                    <td>{{$supervisor->user->username}}</td>
                    <td>{{$supervisor->user->email}}</td>
                    <td>{{$supervisor->phone_number}}</td>
                    <td>{{$supervisor->dob}}</td>
                    <td>{{$supervisor->department}}</td>
                    <td>{{$supervisor->class_name}}</td>
                    <td>{{$supervisor->alt_phone}}</td>
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