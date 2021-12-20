@extends('layouts.dashboard')
@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <form id="AddForm">
            @csrf
            @foreach($unallocated_towns as $town)
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="{{$town}}_id">Town Name</label>
                        <input type="text" id="{{$town}}_id" class="form-control" value="{{$town}}" readonly aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="{{$town}}_amount_id">Town Amount</label>
                        <input type="number" id="{{$town}}_amount_id" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
            </div>

            @endforeach

        </form>
        <div>
            <Button id="submit" name="submit" class="btn btn-success">Submit</Button>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/towns.js"></script>
@endsection