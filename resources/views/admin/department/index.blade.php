@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
@if(session()->has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Success</strong> {{session()->get('warning')}}
</div>
@endif
<div class="container-fluid table-responsive">
    <table class="table table-striped table-bordered table-hover  dt-responsive" id="thisTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Initials</th>
                <th>Added On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                <td scope="row">{{$department->id}}</td>
                <td>{{$department->name}}</td>
                <td>{{$department->initials}}</td>
                <td>{{$department->created_at}}</td>
                <td>
                    <div style="display: flex;justify-content:space-between">
                        <a href="{{route('admin.department.edit',$department->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

                        <form method="post" action="{{route('admin.department.destroy',$department->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                            </button>

                        </form>
                    </div>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
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