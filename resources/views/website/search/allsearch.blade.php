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
                                    <h2 class="grid-title"><i class="fa fa-filter"></i></h2>

                                    <!-- BEGIN FILTER BY CATEGORY -->
                                    <h4></h4>

                                    <div class="padding"></div>

                                    <!-- BEGIN FILTER BY DATE -->
                                </div>
                                <!-- END FILTERS -->
                                <!-- BEGIN RESULT -->
                                <div class="col-md-9">
                                    <h2><i class="bx bx-search"></i> نتائج البحث</h2>
                                    <hr>
                                    <!-- BEGIN SEARCH INPUT -->
                                    <form action="{{route('website.allsearch')}}" class="text-center">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <input type="text" id="search" name="search" class="form-control" value="{{$search??''}}">
                                            </div>
                                            <div class="">
                                                <button type="submit" class="btn btn-primary">
                                                    <i style="color: #fff;" class="bx bx-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
                                    @if(isset($factories)&&$factories->count()>0)
                                        <h2 class="card p-2 text-center">المصانع</h2>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                            @foreach($factories as $factory)
                                                <tr>
                                                <td class="image"><img src="{{asset('images/factories/'.$factory->image)}}" alt=""></td>
                                                <td class="product"><strong><a href="{{route('website.show.factory',$factory->id)}}">{{$factory->name}}</a></strong><br>{{$factory->description}}.</td>
                                                <td class=" text-right">{{$factory->category->name}}</td>
                                                <td class=" text-right">{{$factory->mobiles[0]->mobile??'رقم الهاتف غير متوفر'}}</td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <p class="text-center"><a href="{{route('website.allfactories').'?search='.$search??''}}" class="text-muted text-center">عرض الكل</a></p>
                                    </div>
                                    @endif

                                    @if(isset($products)&&$products->count()>0)
                                        <h2 class="card p-2 text-center">المنتجات</h2>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                @foreach($products as $product)
                                                    <tr>
                                                        <td class="image"><img src="{{asset('images/products/'.$product->image)}}" alt=""></td>
                                                        <td class="product"><strong><a href="" class="productDetails" showid="{{$product->id}}">{{$product->name}}</a></strong><br>
                                                            <a class="text-dark" href="{{route('website.show.factory',$product->factory->id)}}">{{$product->factory->name}}.</a></td>
                                                        <td class=" text-right text-{{$product->status==1?'primary':'danger '}}">{{$product->status==1?'متوفر':'غير متوفر'}}</td>
                                                        <td class="price text-right">{{$product->price}} جنية</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <p class="text-center"><a href="{{route('website.allproducts').'?search='.$search??''}}" class="text-muted text-center">عرض الكل</a></p>
                                        </div>
                                @endif

                                    @if(isset($services)&&$services->count()>0)
                                        <h2 class="card p-2 text-center">الخدمات</h2>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                @foreach($services as $service)
                                                    <tr>
                                                        <td class="image"><img src="{{asset('images/services/'.$service->image)}}" alt=""></td>
                                                        <td class="product"><strong><a class="serviceDetails" showid="{{$service->id}}" href="">{{$service->name}}</a></strong><br>
                                                            <a class="text-dark" href="{{route('website.show.factory',$service->factory->id)}}">{{$service->factory->name}}.</a></td>
                                                        <td class=" text-right text-{{$service->status==1?'primary':'danger '}}">{{$service->status==1?'متوفر':'غير متوفر'}}</td>
                                                        <td class="price text-right">{{$service->price}} جنية</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <p class="text-center"><a href="{{route('website.allservices').'?search='.$search??''}}" class="text-muted text-center">عرض الكل</a></p>
                                        </div>
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
<div id="modalShow">

</div>
    </main><!-- End #main -->

    <script>
        window.onload=function () {
            $('.productDetails').click(function (e) {
                e.preventDefault();
                $.ajax({
                    type:'post',
                    url:'{{route('website.show.product')}}',
                    data:{
                        id:$(this).attr('showid'),
                        '_token':'{{csrf_token()}}'
                    },
                    success:function (data) {
                        $('#modalShow').html(data.modal);
                        $('#productModal').modal('show');

                    },
                    reject:function (reject) {

                    }
                });
            });

            $('.serviceDetails').click(function (e) {
                e.preventDefault();
                $.ajax({
                    type:'post',
                    url:'{{route('website.show.service')}}',
                    data:{
                        id:$(this).attr('showid'),
                        '_token':'{{csrf_token()}}'
                    },
                    success:function (data) {
                        $('#modalShow').html(data.modal);
                        $('#serviceModal').modal('show');

                    },
                    reject:function (reject) {

                    }
                });
            });


        }
    </script>
    @endsection