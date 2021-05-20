@extends('layouts.factory')
@section('title') Index @endsection
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
                        <img src="{{asset('images/factories/'.$factory->image)}}" alt="صورة المصنع" class="users-avatar-shadow rounded-circle" height="150" width="150">
                    </p>
                    <div class="media-body mt-5">
                            <button id="changeImage" href="#" class="btn btn-outline-primary m-1">تغيير الصورة</button>
                    </div>
                    <div class="pull-right mt-5 mr-5">
                        <a class="btn btn-success" href="{{route('factory.getpassword')}}">تغيير الرقم السري</a>
                    </div>
                </div>
                <!-- users edit media object ends -->
                <!-- users edit account form start -->
                <form action="{{route('factory.profile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input id="imageInput" type="file" name="image" hidden>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="الاسم" value="{{$factory->name}}">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">البريد الالكتروني</label>
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="البريد الالكتروني" value="{{$factory->email}}">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cat_id">التصنيف</label>
                                <select name="cat_id" id="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                                    @foreach($categories as $category)
                                        <option {{$category->id==$factory->cat_id?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('cat_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="email">الحالة</label>
                                <p class="form-control text-{{$factory->status==0?'danger':'success'}}">{{$factory->status==1?'مفعل':'غير مفعل'}}</p>
                            </div>
                            <div class="form-group">
                                <label for="email">الخريطة</label>
                                <p class="form-control text-{{$factory->map_status==0?'danger':'success'}}">{{$factory->map_status==1?'موجود علي الخريطة':'غير موجود علي الخريطة'}}</p>
                            </div>
                            <div class="form-group">
                                <label for="description">الوصف</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px">{{$factory->description}}</textarea>
                                @error('description')
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