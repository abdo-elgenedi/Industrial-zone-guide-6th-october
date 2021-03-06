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
            <form class="bb-form" action="{{route('factory.register')}}" method="POST">
                @csrf
                <span class="bb-form-title p-b-26"> ???????? ???????? ???????????? </span>
                <div class="wrap-input100 mb-3 mt-3">
                    <input class="input100 text-left" type="text" name="name" value="{{@old('name')}}" required>
                    <span class="bbb-input" data-placeholder="?????????? ????????????"></span>
                </div>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="wrap-input100 mb-1 mt-3">
                    <textarea class="input100 text-left" type="text" name="description" required>{{@old('description')}}</textarea>
                    <span class="bbb-input" data-placeholder="??????????"></span>
                </div>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 mb-1 mt-3">
                    <input class="input100 text-left" type="email" name="email" required value="{{@old('email')}}">
                    <span class="bbb-input" data-placeholder="???????????? ????????????????????"></span>
                </div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class=" mb-1 mt-3">
                    <select class="form-control text-left" type="text" name="cat_id" required>
                        <option value="{{NULL}}" selected disabled>??????????</option>
                        @foreach(\App\Models\Category::get() as $cat)
                            <option value="{{$cat->id}}" {{$cat->id==@old('cat_id')?'selected':''}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('mobile')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 mb-1 mt-3">
                    <input class="input100" type="password" name="password" required>
                    <span class="bbb-input" data-placeholder="???????? ????????????"></span>
                </div>
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 mb-1 mt-3">
                    <input class="input100" type="password" name="password_confirmation" required>
                    <span class="bbb-input" data-placeholder="?????????? ???????? ????????????"></span>
                </div>
                <div class="login-container-form-btn">
                    <div class="bb-login-form-btn">
                        <div class="bb-form-bgbtn"></div> <button class="bb-form-btn"> ?????????? </button>
                    </div>
                </div>
                <div class="text-center p-t-115"> <span class="txt1"> ???????? ???????? ???????????? ?? </span> <a class="txt2" href="{{route('factory.login')}}"> ?????????? ????????</a> </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
