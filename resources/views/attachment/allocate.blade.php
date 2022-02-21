@extends('layouts.dashboard')
@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="app">
            <allocator v-bind:towns_array="{{json_encode($towns_array)}}" />
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/app.js" defer></script>
@endsection