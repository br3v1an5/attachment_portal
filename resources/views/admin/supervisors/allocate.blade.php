@extends('layouts.dashboard')
@section('styles')

@endsection

@section('content')



<h5>Allocate Supervisors to towns</h5>
<div class="row">
    <div class="col-md-12">
        <div id="app">
            <town-allocator v-bind:towns="{{json_encode($towns)}}" v-bind:supervisors="{{json_encode($supervisors)}}" />
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="/js/app.js" defer></script>
@endsection