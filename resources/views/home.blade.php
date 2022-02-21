@extends('layouts.app')

@section('content')
<div class="container">

    <div class="mt-2 mb-4">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 ml-auto mr-auto">
            <div class="col-sm-12 border border-primary shadow rounded bg-white py-2 text-center">
                <h4>Welcome {{auth()->user()->name}}</h4>
                <a href="logout.php" class="text-muted"><i class="fa fa-fw fa-power-off"></i> Logout</a>
            </div>
        </div>
        <!--/.col-xs-12 col-sm-8 col-md-6 col-lg-4-->
    </div>
    <!--/.mt-2 mb-4-->
</div>
<!--/.container-->

@endsection