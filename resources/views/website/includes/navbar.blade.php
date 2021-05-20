<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class="logo ml-auto"><a href="{{route('index')}}">المنطقه الصناعيه</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{route('index')}}  ">الرئيسيه</a></li>
                <li><a href="{{route('index')}}/#about">معلومات عنا</a></li>
                <li><a href="{{route('index')}}/#services">خدماتنا</a></li>
               <!-- <li class="drop-down"><a href="">Drop Down</a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="drop-down"><a href="#">Deep Drop Down</a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>-->
                <li><a href="{{route('index')}}/#contact">تواصل معنا</a></li>

            </ul>
        </nav><!-- .nav-menu -->

       @if(Auth::guard('web')->check())
            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                  class="get-started-btn scrollto">تسجيل الخروج</a>
            <form action="{{route('logout')}}" hidden method="POST" id="logout-form">@csrf</form>
       @else <a href="{{route('login')}}" class="get-started-btn scrollto">تسجيل الدخول</a>@endif


    </div>
</header><!-- End Header -->