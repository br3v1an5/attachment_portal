@extends('layouts.dashboard')
@section('styles')

@endsection

@section('content')



<h5>IMPORT STUDENT DETAILS</h5>
<form method="post" enctype="multipart/form-data" action="{{route('admin.upload_template')}}">
    @csrf
    <section>
        <div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Download XLXS template File</label>
                        <a class="btn btn-success" target="_blank" href="{{route('admin.template')}}">Download<i class="fa fa-download" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Upload a filled XLXS File</label>
                        <input type="file" class="form-control @error('filled_doc') is-invalid  @enderror" required name="filled_doc">
                        @error('filled_doc')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            @if(isset($failures))
            @foreach($failures as $failure)
            <p class="text-danger">
                Please check row {{$failure->row()}},
                For Column {{$failure->attribute()}},
                failed with the following errors; <br />
                @foreach($failure->errors() as $msg)
                <span class="font-weight-bold ml-2"><i class="fa fa-times" aria-hidden="true"></i>{{$msg}}</span> <br />
                @endforeach

                The values got were : <br />
                @foreach($failure->values() as $value)
                <span class="ml-2"> {{$value}}</span><br />
                @endforeach
            </p>
            @endforeach
            @endif

        </div>
    </section>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-sm btn-success float-right" id="submit">
                Submit
            </button>
        </div>
    </div>
</form>

@endsection
@section('scripts')

@endsection