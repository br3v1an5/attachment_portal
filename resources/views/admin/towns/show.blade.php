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
    <strong>Alert:</strong> {{session()->get('warning')}}
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Success</strong> {{session()->get('success')}}
</div>
@endif

<div class="container-fluid table-responsive">
    <table class="table table-striped table-bordered table-hover  dt-responsive" id="thisTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Added On</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($towns as $town)
            <tr>
                <td scope="row">{{$town->id}}</td>
                <td>{{$town->name}}</td>
                <td>{{$town->amount}}</td>
                <td>{{$town->created_at}}</td>
                <td>
                    <div style="display:flex;justify-content:space-between">
                        <a href="{{route('admin.towns.edit', $town)}}" class="btn btn-info btn-primary">Edit</a>
                        <form method="post" action="{{route('admin.towns.destroy',$town->id)}}">
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