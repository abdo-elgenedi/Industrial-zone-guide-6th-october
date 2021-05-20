@extends('layouts.admin')
@section('title') Password @endsection
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
                <div class="mb-2">
                    <div class="float-right mt-5 mr-5">
                        <a class="btn btn-success" href="{{route('admin.getprofile')}}">تغيير الملف الشخصي</a>
                    </div>
                </div>
                <!-- users edit media object ends -->
                <!-- users edit account form start -->
                <form action="{{route('admin.password')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="oldpassword">كلمة المرور القديمة</label>
                                <input id="oldpassword" name="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" placeholder="كلمة المرور القديمة" >
                                @error('oldpassword')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">كلمة المرور الجديدة</label>
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="كلمة المرور الجديدة" >
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">تأكيد كلمة المرور</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="تأكيد كلمة المرور" >
                                @error('password_confirmation')
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