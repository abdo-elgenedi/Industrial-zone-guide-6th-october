<!-- Begin SideBar-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item @if(\Illuminate\Support\Facades\Request::is('factory')) active @endif"><a href="{{route('factory.index')}}"><i class="la la-mouse-pointer"></i><span
                            class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item">
                <a href=""><i class="la la-map"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الخريطة </span>
                </a>
                <ul class="menu-content">
                    <li class="@if(\Illuminate\Support\Facades\Request::is('factory/map')) active @endif"><a class="menu-item" href="{{route('factory.map')}}"
                                          data-i18n="nav.dash.ecommerce"> أضف / تعديل </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">إدارة التصنيفات </span>
                    <span
                            class="badge badge badge-danger badge-pill float-right mr-2">
                        {{\App\Models\FactoryCategory::where('fact_id',Auth::user()->id)->count()}}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="@if(\Illuminate\Support\Facades\Request::is('factory/categories')||\Illuminate\Support\Facades\Request::is('factory/categories/edit*')) active @endif">
                        <a class="menu-item" href="{{route('factory.categories')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a></li>
                    <li class="@if(\Illuminate\Support\Facades\Request::is('factory/categories/create')) active @endif">
                        <a class="menu-item" href="{{route('factory.categories.create')}}" data-i18n="nav.dash.crypto">أضافة تصنيف</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">إدارة المنتجات </span>
                    <span
                            class="badge badge badge-danger badge-pill float-right mr-2">
                        {{\App\Models\Product::where('fact_id',Auth::user()->id)->count()}}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="@if(\Illuminate\Support\Facades\Request::is('factory/products')||\Illuminate\Support\Facades\Request::is('factory/products/edit*')) active @endif">
                        <a class="menu-item" href="{{route('factory.products')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a></li>
                    <li class="@if(\Illuminate\Support\Facades\Request::is('factory/products/create')) active @endif">
                        <a class="menu-item" href="{{route('factory.products.create')}}" data-i18n="nav.dash.crypto">أضافة منتج</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">إدارة الخدمات </span>
                    <span
                            class="badge badge badge-danger badge-pill float-right mr-2">
                        {{\App\Models\Service::where('fact_id',Auth::user()->id)->count()}}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="@if(\Illuminate\Support\Facades\Request::is('factory/services')||\Illuminate\Support\Facades\Request::is('factory/services/edit*')) active @endif">
                        <a class="menu-item" href="{{route('factory.services')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a></li>
                    <li class="@if(\Illuminate\Support\Facades\Request::is('factory/services/create')) active @endif">
                        <a class="menu-item" href="{{route('factory.services.create')}}" data-i18n="nav.dash.crypto">أضافة خدمة</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">إدارة ارقام الهاتف </span>
                    <span
                            class="badge badge badge-danger badge-pill float-right mr-2">
                        {{\App\Models\Mobile::where('fact_id',Auth::user()->id)->count()}}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="@if(\Illuminate\Support\Facades\Request::is('factory/mobiles')||\Illuminate\Support\Facades\Request::is('factory/mobiles/edit*')) active @endif">
                        <a class="menu-item" href="{{route('factory.mobiles')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a></li>
                    <li class="@if(\Illuminate\Support\Facades\Request::is('factory/mobiles/create')) active @endif">
                        <a class="menu-item" href="{{route('factory.mobiles.create')}}" data-i18n="nav.dash.crypto">أضافة رقم هاتف</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="app-content content">
    <div class="content-wrapper">
<!--End Sidebare-->