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
            <form class="bb-form" action="{{route('register')}}" method="POST">
                @csrf
                <span class="bb-form-title p-b-26"> حساب جديد  </span>
                <div class="wrap-input100 mb-3 mt-3">
                    <input class="input100 text-left" type="text" name="name" required value="{{@old('name')}}">
                    <span class="bbb-input" data-placeholder="الاسم الكامل"></span>
                </div>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="wrap-input100 mb-1 mt-3">
                    <input class="input100 text-left" type="text" name="username" required value="{{@old('username')}}">
                    <span class="bbb-input" data-placeholder="اسم المستخدم"></span>
                </div>
                @error('username')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 mb-1 mt-3">
                    <input class="input100 text-left" type="email" name="email" required value="{{@old('email')}}">
                    <span class="bbb-input" data-placeholder="البريد الالكتروني"></span>
                </div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 mb-1 mt-3">
                    <input class="input100 text-left" type="text" name="mobile" required value="{{@old('mobile')}}">
                    <span class="bbb-input" data-placeholder="رقم الهاتف"></span>
                </div>
                @error('mobile')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 mb-1 mt-3">
                    <input class="input100" type="password" name="password" required>
                    <span class="bbb-input" data-placeholder="كلمه المرور"></span>
                </div>
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 mb-1 mt-3">
                    <input class="input100" type="password" name="password_confirmation" required>
                    <span class="bbb-input" data-placeholder="تأكيد كلمه المرور"></span>
                </div>
                <div class="login-container-form-btn">
                    <div class="bb-login-form-btn">
                        <div class="bb-form-bgbtn"></div> <button class="bb-form-btn"> تسجيل </button>
                    </div>
                </div>
                <div class="text-center p-t-115"> <span class="txt1"> لديك حساب بالفعل ؟ </span> <a class="txt2" href="{{route('login')}}"> تسجيل دخول</a> </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
