@extends('layouts.website')
@section('content')
    <style>
        td:hover{
            cursor: default;
        }
    </style>
    <main id="main" class="mt-5 pt-5">
        <div class="container">
            <div class="row">
                <!-- BEGIN SEARCH RESULT -->
                <div class="col-md-12">
                    <div class="grid search">
                        <div class="grid-body">
                            <div class="row">
                                <!-- BEGIN FILTERS -->
                                <div class="col-md-3">
                                    <h5 class="text-center mt-3">فلاتر البحث</h5>
                                    <form class="card p-2" action="{{route('website.allservices')}}">
                                        <input type="text" id="search" name="search" placeholder="ابحث عن..." class="form-control" value="{{$search??''}}">
                                        <select name="fact_id" id="fact_id" class="form-control mt-4">
                                            <option value="0">كل المصانع</option>
                                            @if(isset($factories)&&$factories->count()>0)
                                                @foreach($factories as $factory)
                                                    <option {{request()->fact_id==$factory->id? 'selected':''}} value="{{$factory->id}}">{{$factory->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>

                                        <select name="order" id="order" class="form-control mt-4">
                                            <option {{request()->order=='ASC'? 'selected':''}} value="{{'ASC'}}">تصاعدي (أ-ي)</option>
                                            <option {{request()->order=='DESC'? 'selected':''}} value="{{'DESC'}}">تنازلي (ي-أ)</option>
                                        </select>

                                        <button type="submit" class="btn btn-primary mt-4">تطبيق</button>
                                    </form>

                                    <div class="padding"></div>

                                    <!-- BEGIN FILTER BY DATE -->
                                </div>
                                <!-- END FILTERS -->
                                <!-- BEGIN RESULT -->
                                <div class="col-md-9">
                                    <h2><i class="bx bx-search"></i> نتائج البحث عن {{request()->search}}</h2>
                                    <hr>
                                    <!-- BEGIN SEARCH INPUT -->
                                    <!-- END SEARCH INPUT -->
                                    <div class="row">
                                        <!-- BEGIN ORDER RESULT -->
                                        <!-- END ORDER RESULT -->

                                        <div class="col-md-6 text-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default active"><i class="fa fa-list"></i></button>
                                                <button type="button" class="btn btn-default"><i class="fa fa-th"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BEGIN TABLE RESULT -->
                                    @if(isset($services)&&$services->count()>0)
                                        <h2 class="card p-2 text-center">المنتجات</h2>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                            @foreach($services as $service)
                                                <tr>
                                                    <td class="image"><img src="{{asset('images/services/'.$service->image)}}" alt=""></td>
                                                    <td class="product"><strong><a href="">{{$service->name}}</a></strong><br>
                                                        <a class="text-dark" href="{{route('website.show.factory',$service->factory->id)}}">{{$service->factory->name}}.</a></td>
                                                    <td class=" text-right text-{{$service->status==1?'primary':'danger '}}">{{$service->status==1?'متوفر':'غير متوفر'}}</td>
                                                    <td class="price text-right">{{$service->price}} جنية</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$services->appends(request()->query())->links()}}
                                    </div>
                                        @else
                                        <p class="card text-primary p-2">لايتوفر نتائج بحث عن {{$search??''}} يمكنك تغيير الفلاتر </p>
                                    @endif

                                    <!-- END TABLE RESULT -->

                                    <!-- BEGIN PAGINATION -->
                                    <!-- END PAGINATION -->
                                </div>
                                <!-- END RESULT -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SEARCH RESULT -->
            </div>
        </div>

    </main><!-- End #main -->
    @endsection