@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Success</strong> {{session()->get('success')}}
</div>
@endif
<div id="table">
    <div class="adv-table">
        <table class="table table-striped  dt-responsive" id="thisTable">
            <thead class="thead-inverse">
                <tr>
                    <th></th>
                    <th>FULL NAME</th>
                    <th>Username</th>
                    <th>EMAIL</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                @can('view', $user)
                <tr>
                    <td></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->user_role}}</td>
                    <th>
                        @can('delete', $user)
                        <form method="post" action="{{route('admin.users.destroy',$user->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                            </button>

                        </form>
                        @endcan
                    </th>
                </tr>
                @endcan
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