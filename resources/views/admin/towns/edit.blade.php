@extends('layouts.dashboard')
@section('styles')

@endsection
@section('content')
@if(session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Success</strong> {{session()->get('success')}}
</div>
@endif

<div class="container-fluid">
    <h3 class="h3">Update Amount Allocated To {{$town->name}}</h3>
    <form action="{{route('admin.towns.update', $town->id)}}" method="post">
        @csrf

        @method('PATCH')
        <div class="form-group">
            <label for="town_amount">{{$town->name}}</label>
            <input type="text" name="amount" id="town_amount" class="form-control" value="{{old('amount') ?? $town->amount}}">
        </div>
        <button class="btn btn-sm btn-success">Submit</button>
    </form>
</div>
@endsection

@section('scripts')

@endsection