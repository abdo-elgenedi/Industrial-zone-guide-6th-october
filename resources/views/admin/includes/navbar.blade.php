<!-- Begin SideBar-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item @if(\Illuminate\Support\Facades\Request::is('admin')) active @endif"><a href="{{route('admin.index')}}"><i class="la la-mouse-pointer"></i><span
                            class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item">
                <a href=""><i class="la la-map"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الخريطة </span>
                </a>
                <ul class="menu-content">
                    <li class="@if(\Illuminate\Support\Facades\Request::is('admin/map')) active @endif"><a class="menu-item" href="{{route('admin.map')}}"
                                          data-i18n="nav.dash.ecommerce"> حذف / تعديل </a>
                    </li>

                    <li class="@if(\Illuminate\Support\Facades\Request::is('admin/map/block')) active @endif"><a class="menu-item" href="{{route('admin.map.block')}}"
                                                                                                           data-i18n="nav.dash.ecommerce"> اسماء القطع </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">إدارة التصنيفات </span>
                    <span
                            class="badge badge badge-danger badge-pill float-right mr-2">
                        {{\App\Models\Category::count()}}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="@if(\Illuminate\Support\Facades\Request::is('admin/categories')||\Illuminate\Support\Facades\Request::is('admin/categories/edit*')) active @endif">
                        <a class="menu-item" href="{{route('admin.categories')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a></li>
                    <li class="@if(\Illuminate\Support\Facades\Request::is('admin/categories/create')) active @endif">
                        <a class="menu-item" href="{{route('admin.categories.create')}}" data-i18n="nav.dash.crypto">أضافة تصنيف</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">إدارة المنتجات </span>
                    <span
                            class="badge badge badge-danger badge-pill float-right mr-2">
                        {{\App\Models\Product::count()}}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="@if(\Illuminate\Support\Facades\Request::is('admin/products')||\Illuminate\Support\Facades\Request::is('factory/products/edit*')) active @endif">
                        <a class="menu-item" href="{{route('admin.products')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
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
                    <li class="@if(\Illuminate\Support\Facades\Request::is('admin/services')||\Illuminate\Support\Facades\Request::is('admin/services/edit*')) active @endif">
                        <a class="menu-item" href="{{route('admin.services')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">إدارة المصانع </span>
                    <span
                            class="badge badge badge-danger badge-pill float-right mr-2">
                        {{\App\Models\Factory::count()}}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="@if(\Illuminate\Support\Facades\Request::is('admin/factories')) active @endif">
                        <a class="menu-item" href="{{route('admin.factories')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">إدارة المستخدمين </span>
                    <span
                            class="badge badge badge-danger badge-pill float-right mr-2">
                        {{\App\User::count()}}
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="@if(\Illuminate\Support\Facades\Request::is('admin/users')) active @endif">
                        <a class="menu-item" href="{{route('admin.users')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</div>
<div class="app-content content">
    <div class="content-wrapper">
<!--End Sidebare-->