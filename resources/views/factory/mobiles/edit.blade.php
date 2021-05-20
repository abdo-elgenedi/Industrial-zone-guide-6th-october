@extends('layouts.factory')
@section('title') Mobiles @endsection
@section('content')


    <h3 class="card text-center p-1 bg-success">تعديل الهاتف ({{$mobile->mobile}})</h3>

    <form class="form form-horizontal card p-3" method="POST" action="{{route('factory.mobiles.update')}}">
        @csrf
        <input type="hidden" value="{{$mobile->id}}" name="id">
        <div class="form-body">
            <div class="form-group row">
                <label class="col-md-3 label-control" for="mobile">الرقم</label>
                <div class="col-md-9">
                    <input type="text" id="mobile" class="form-control" placeholder="ادخل رقم الهاتف" name="mobile" value="{{$mobile->mobile}}">
                    @error('mobile')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
                    <div class="form-actions pull-left">
            <a class="btn btn-warning mr-1" href="{{route('factory.mobiles')}}">
                <i class="ft-x"></i> رجوع
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="la la-check-square-o"></i> تحديث
            </button>
        </div>
        </div>

    </form>

    @endsection