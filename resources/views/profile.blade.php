@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="tab-wizard wizard-circle">
        <h5>Personal Information</h5>
        <section>
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" readonly class="form-control" value="{{$user->name}}">
                            @csrf
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" readonly class="form-control" value="{{$user->username}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="text" readonly class="form-control" value="{{$user->email}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" readonly class="form-control" value="{{$user->user_role}}">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <h5>Security Information</h5>
        <h6>Change Password</h6>
        <section>
            <form action="{{route('change_password')}}" method="post" style="margin-bottom: 5px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Enter current password</label>
                            <input type="password" name="old_password" class="form-control  @error('password') is-invalid
                            @enderror">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            @csrf
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>New password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-small btn-info">Change Password</button>
                    </div>

                </div>

            </form>
        </section>


    </div>
</div>
<!--/.container-->

@endsection