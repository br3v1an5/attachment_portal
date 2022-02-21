@extends('layouts.auth')

@section('content')
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="images/moilogo.png" class="brand_logo" alt="Logo" />
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form method="post" action="{{route('login')}}" id="form1">
                    <div align="center">
                        <h4 class="text-white font-weight-bold">ZIWA Technical Training Institute<br />
                        </h4>
                        <i class="text-white">Technology for human advancement</i>
                    </div>
                    <br />
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input name="username" value="{{ old('username') }}" type="text" @error('username') is-invalid @enderror id="Main_txtUserName" class="form-control input_user" placeholder="Username or Reg No." required />
                        @error('username')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input name="password" type="password" @error('password') is-invalid @enderror autocomplete="off" id="Main_txtPassword" class="form-control input_pass" placeholder="password" required="" />
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline" />
                            <label class="custom-control-label text-white" for="customControlInline">Remember
                                me</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <input type="submit" name="ctl00$Main$btnDefaultLogin" value="Log In" id="Main_btnDefaultLogin" class="btn login_btn" />
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            <a href="{{route('password.request')}}" class="text-white">Forgot your password?</a>
                            <br />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection