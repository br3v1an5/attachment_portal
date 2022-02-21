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
    <div class="mt-2 mb-4">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 ml-auto mr-auto">
            <div class="col-sm-12 border border-primary shadow rounded bg-white py-2 text-center">
                <h1>Welcome {{auth()->user()->name}}</h1>
            </div>
        </div>
        <!--/.col-xs-12 col-sm-8 col-md-6 col-lg-4-->
    </div>
    <!--/.mt-2 mb-4-->
</div>
@endsection