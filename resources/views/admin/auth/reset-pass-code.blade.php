<!doctype html>
<html class="no-js " lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Wordly || Reset Password</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('public/images/logo.png')}}" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('public/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/style.min.css')}}">
</head>

<body class="theme-blush">

    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form" method="POST" action="{{ route('admin.pass.code') }}">
                        @csrf
                        <div class="header">
                            <img class="logo" src="{{asset('public/images/logo.png')}}" alt="">
                            <h5>Forgot Password?</h5>
                            <span>Enter your e-mail address below to reset your password.</span>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter Email" name="email">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="pin" placeholder="Enter Verification Code"  class="form-control"/>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="New Password" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Reset
                                Password</button>
                        </div>
                    </form>
                    <div class="text-center mb-3">
                        <script type="text/javascript">
                        window.setTimeout(
                            "document.getElementById('popmessage').style.display='none';",
                            6000);
                        </script>
                        @if(session()->has('error'))
                        <div id="popmessage" class="text-danger form-control-feedback" style="color:red;">
                            {{ session()->get('error') }}<br />
                        </div>
                        @endif
                        @if(session()->has('success'))
                        <div id="popmessage" class="text-success form-control-feedback">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="{{asset('public/images/signin.jpg')}}" alt="Forgot Password" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{asset('public/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{asset('public/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
</body>


</html>