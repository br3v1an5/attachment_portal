@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@if($students->count() > 0)
<!-- Buttons -->
@endif
<div id="table">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">ZIWA TTI</h3>
            <h3 class="text-center">Students Yet to fill attachment applications</h3>
        </div>
    </div>
    <div class="adv-table">
        <table class="table table-striped  dt-responsive" id="thisTable">
            <thead class="thead-inverse">
                <tr>
                    <th></th>
                    <th>Names</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>REG Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td></td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->department ? $student->department->name : ''}}</td>
                    <td>{{$student->username}}</td>
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