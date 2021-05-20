<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Arsha Bootstrap Template - Index</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
        <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

        <!-- summernote -->
        <link rel="stylesheet" href="{{asset("assets/plugins/summernote/summernote-bs4.css")}}">

        <link rel="stylesheet" href="{{asset("assets/plugins/file-uploaders/dropzone.css")}}">

        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

        <!-- =======================================================
        * Template Name: Arsha - v2.3.1
        * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>
    <body>
    <div class="limit">
        <div class="login-container">
            <div class="bb-login">
                <form class="bb-form" action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="row mb-2">
                        <span class="col-md-9 bb-form-title p-b-26"> تسجيل الدخول للمستخدم </span>
                        <h6><a href="{{route('factory.login')}}">هل انت مصنع؟</a></h6>
                    </div>
                    @if(Session::has('error'))
                        <div class="row mb-2">
                            <p class="col-md-12 btn btn-outline-danger text-center">{{Session::get('error')}}</p>
                        </div>
                    @endif
                    <div class="wrap-input100">
                        <input class="input100 text-left" type="text" name="email" required>
                        <span class="bbb-input" data-placeholder="البريد الالكتروني"></span>
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password" required>
                        <span class="bbb-input" data-placeholder="كلمه المرور"></span>
                    </div>
                    <div class="login-container-form-btn">
                        <div class="bb-login-form-btn">
                            <div class="bb-form-bgbtn"></div> <button class="bb-form-btn"> تسجيل الدخول </button>
                        </div>
                    </div>
                    <div class="text-center p-t-115"> <span class="txt1"> ليس لديك حساب ؟ </span> <a class="txt2" href="{{route('register')}}"> تسجيل </a> </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
