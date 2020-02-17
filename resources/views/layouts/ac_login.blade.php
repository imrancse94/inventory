<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}} | {{__('Log In')}}</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('adminca')}}/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('adminca')}}/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('adminca')}}/assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('adminca')}}/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="{{asset('adminca')}}/assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="{{asset('adminca')}}/assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="{{asset('adminca')}}/assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="{{asset('adminca')}}/assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url('{{asset('adminca')}}/assets/img/blog/17.jpeg');
        }

        .cover {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(117, 54, 230, .1);
        }

        .login-content {
            max-width: 400px;
            margin: 100px auto 50px;
        }

        .auth-head-icon {
            position: relative;
            height: 60px;
            width: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            background-color: #fff;
            color: #5c6bc0;
            box-shadow: 0 5px 20px #d6dee4;
            border-radius: 50%;
            transform: translateY(-50%);
            z-index: 2;
        }
    </style>
</head>

<body>
<div class="cover"></div>
<div class="ibox login-content">
    <div class="text-center">
        <span class="auth-head-icon"><img src="{{asset('logo2.png')}}" alt=""></span>
    </div>
    @yield('content')
</div>
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- CORE PLUGINS-->
<script src="{{asset('adminca')}}/assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="{{asset('adminca')}}/assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="{{asset('adminca')}}/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{asset('adminca')}}/assets/vendors/metisMenu/dist/metisMenu.min.js"></script>
<script src="{{asset('adminca')}}/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{asset('adminca')}}/assets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
<script src="{{asset('adminca')}}/assets/vendors/toastr/toastr.min.js"></script>
<script src="{{asset('adminca')}}/assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="{{asset('adminca')}}/assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<!-- PAGE LEVEL PLUGINS-->
<!-- CORE SCRIPTS-->
<script src="{{asset('adminca')}}/assets/js/app.min.js"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script>
    $(function() {
        $('#login-form').validate({
            errorClass: "help-block",
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            highlight: function(e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight: function(e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
        });
    });
</script>
</body>

</html>