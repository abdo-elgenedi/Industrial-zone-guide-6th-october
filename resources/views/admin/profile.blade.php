@extends('layouts.admin')
@section('title') Profile @endsection
@section('content')
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- users edit start -->
        <section class="users-edit">
            <div class="card p-3">
                @if(Session::has('message'))
                <div class="alert alert-{{Session::get('color')}} alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{Session::get('message')}}
                </div>
                @endif
                <!-- users edit media object start -->
                <div class="media mb-2">
                    <p class="mr-2" href="#">
                        <img src="{{asset('images/admins/'.$admin->image)}}" alt="صورة المصنع" class="users-avatar-shadow rounded-circle" height="150" width="150">
                    </p>
                    <div class="media-body mt-5">
                            <button id="changeImage" href="#" class="btn btn-outline-primary m-1">تغيير الصورة</button>
                    </div>
                    <div class="pull-right mt-5 mr-5">
                        <a class="btn btn-success" href="{{route('admin.getpassword')}}">تغيير الرقم السري</a>
                    </div>
                </div>
                <!-- users edit media object ends -->
                <!-- users edit account form start -->
                <form action="{{route('admin.profile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input id="imageInput" type="file" name="image" hidden>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="الاسم" value="{{$admin->name}}">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="username">اسم المستخدم</label>
                                <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="اسم المستخدم" value="{{$admin->username}}">
                                @error('username')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">البريد الالكتروني</label>
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="البريد الالكتروني" value="{{$admin->email}}">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="mobile"> رقم الهاتف</label>
                                <input id="mobile" name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="رقم الهاتف " value="{{$admin->mobile}}">
                                @error('mobile')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">حفظ الاعدادات</button>
                        </div>
                    </div>
                </form>
                <!-- users edit account form ends -->
            </div>
        </section>
        <!-- users edit ends -->
    </div>

    <script>
        window.onload=function () {
            $('#changeImage').click(function () {
                $('#imageInput').click();
            });
        }
    </script>
@endsection