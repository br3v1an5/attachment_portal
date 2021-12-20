<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/form-style-z.css" type="text/css">
    <title>{{config('app.name')}} |Login-Register</title>

</head>

<body style="background: url(https://images.pexels.com/photos/1558732/pexels-photo-1558732.jpeg) no-repeat center center; background-size:cover cover; height:100vh;">
    <div class="overlay"></div>
    <div class="container">
        <div class="mt-2 mb-4">
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 ml-auto mr-auto">
                <ul class="nav nav-pills nav-fill mb-1" id="pills-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="true">Sign Up</a> </li>
                    <li class="nav-item"> <a class="nav-link active" id="pills-signin-tab" data-toggle="pill" href="#pills-signin" role="tab" aria-controls="pills-signin" aria-selected="false">Sign In</a> </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
                        <div class="col-sm-12 border border-primary shadow rounded bg-white pt-2">
                            <div class="text-center"><img src="http://placehold.it/80x80" class="rounded-circle border p-1"></div>
                            <em id="signUpMsg"></em>
                            <form method="post" id="singnupFrom" onSubmit="return false;">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-bold">Full Legal Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="signupname" class="form-control form-control-lg" data-required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="signupemail" class="form-control form-control-lg" placeholder="Enter valid email" data-required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">User Name <span class="text-danger">*</span></label>
                                    <input type="text" name="username" id="signupusername" class="form-control form-control-lg" placeholder="This will be your login name" data-required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="signuppassword" class="form-control form-control-lg" placeholder="*********" data-required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" id="signupcpassword" class="form-control form-control-lg" placeholder="*********" data-required>
                                </div>
                                <div class="form-group">
                                    <label><input type="checkbox" name="agree_to_terms" id="signupcondition" value="1" data-required> I agree with the <a href="javascript:;">Terms &amp; Conditions.</a></label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="signupSubmit" id="signupSubmit" value="Sign Up" class="btn btn-block btn-primary" onClick="formValidate('#singnupFrom','#signUpMsg');"><i class="fa fa-fw fa-sign-out-alt"></i> Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="pills-signin" role="tabpanel" aria-labelledby="pills-signin-tab">
                        <div class="col-sm-12 border border-primary shadow rounded bg-white pt-2">
                            <div class="text-center"><img src="https://placehold.it/80x80" class="rounded-circle border p-1"></div>
                            <em id="signInMsg"></em>
                            <form method="post" id="singninFrom" onSubmit="return false;">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-bold">Email <span class="badge badge-secondary">OR</span> Login Name <span class="text-danger">*</span></label>
                                    <input type="text" name="username" id="username" class="form-control form-control-lg" autocomplete="off" placeholder="Sign in email or user name" value="" data-required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" autocomplete="off" placeholder="***********" data-required>
                                        <div class="input-group-append" data-toggle="tooltip" title="Forgot Password?" data-placement="left">
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#forgotPass"><i class="fa fa-fw fa-key"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="login" id="login" onClick="return formValidate('#singninFrom','#signInMsg');" class="btn btn-block btn-primary"><i class="fa fa-fw fa-sign-in-alt"></i> Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!--/.col-xs-12 col-sm-8 col-md-6 col-lg-4-->

            <!-- Modal -->
            <div class="modal fade" id="forgotPass" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" id="forgotpassForm" onSubmit="return false;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="fa fa-fw fa-lock-open"></i> Forgot Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body"> <em id="forgotPassMsg"></em>
                                <div class="form-group">
                                    <label class="font-weight-bold">Email <span class="badge badge-secondary">OR</span> Login Name <span class="text-danger">*</span></label>
                                    <input type="text" name="forgotemail" id="forgotemail" class="form-control form-control-lg" placeholder="Valid email or login name" data-required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-long-arrow-alt-left"></i> Sign In</button>
                                <button type="submit" name="forgotPassSubmit" id="forgotPassSubmit" class="btn btn-primary" onClick="return formValidate('#forgotpassForm','#forgotPassMsg');"><i class="fa fa-envelope"></i> Send Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.mt-2 mb-4-->
    </div>
    <!--/.container-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/js/form-script.js"></script>
</body>

</html>