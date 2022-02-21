@extends('layouts.auth')

@section('content')
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="/images/moilogo.png" class="brand_logo" alt="Logo" />
                </div>
            </div>

            <div class="d-flex justify-content-center form_container">
                <form method="post" action="{{ route('password.email') }}" id="form1">
                    <div align="center">
                        @csrf

                        <h4 class="text-white font-weight-bold">ZIWA Technical Training College<br />
                        </h4>
                        <h3 class="text-center text-danger">Password Reset</h3>
                        <i class="text-white">Technology for human advancement</i>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                    <br />

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input name="email" type="text" id="Main_txtUserName" class="form-control @error('email') is-invalid @enderror input_user" placeholder="Email" required />
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="d-flex justify-content-center mt-3 login_container">
                        <input type="submit" value="Send Password Reset Link" id="Main_btnDefaultLogin" class="btn login_btn" />
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            <a href="{{route('login')}}" class="text-white">Go to Login</a>
                            <br />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection