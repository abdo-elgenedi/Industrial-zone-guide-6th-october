@extends('layouts.admin')
@section('title') Categories @endsection
@section('content')

    <h3 class="card text-center p-1 bg-success">إضافة تصنيف جديد</h3>

    <form class="form form-horizontal card p-3" method="POST" action="{{route('admin.categories.store')}}">
        @csrf
        <div class="form-body">
            <div class="form-group row">
                <label class="col-md-3 label-control" for="name">ألاسم</label>
                <div class="col-md-9">
                    <input type="text" id="name" class="form-control" placeholder="ادخل اسم التصنيف" name="name" value="{{@old('name')}}">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 label-control" for="hidden-input">اللون</label>
                <div class="col-md-9">
                    <input type="hidden" name="color" id="hidden-input" class="minicolors" value="{{@old('color')}}">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-actions pull-left">
            <a class="btn btn-warning mr-1" href="{{route('admin.categories')}}">
                <i class="ft-x"></i> رجوع
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="la la-check-square-o"></i> حفظ
            </button>
        </div>
        </div>

    </form>

    @endsection