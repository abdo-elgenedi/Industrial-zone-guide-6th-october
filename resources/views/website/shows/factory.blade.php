@extends('layouts.website')
@section('content')
    <style>
        td:hover{
            cursor: default;
        }
    </style>
    <main id="main" class="mt-5 pt-5">
        <div class="container">

                <section style="min-height: 650px">
                    <div class="container">
                        <div class="row p-2" style="border: solid 1px;">
                            <div class="col-md-2"><img height="150" width="150" src="{{asset('images/factories/'.$factory->image)}}" alt=""></div>
                            <div class="col-md-6">
                                <p class="text-primary"><strong>{{isset($factory->name)?$factory->name:''}}</strong></p>
                                <p><strong>{{$factory->category->name??'لايتبع المصنع اي تصنيف حاليا'}}</strong></p>
                                <p>{{$factory->description??'لايوجد وصف لهذا المصنع'}}</p>
                            </div>
                            <div class="col-md-4 p-5">
                                <p>{{$factory->email??'لايتوفر له بريد الكتروني'}}</p>
                                <p>{{$factory->mobiles[0]->mobile??'لايتوفر له ارقام هاتف'}}</p>
                                <p>{{$factory->mobiles[1]->mobile??''}}</p>
                                <p>{{$factory->mobiles[2]->mobile??''}}</p>
                            </div>
                        </div>
                        <div class="mt-1 row" style="border: solid 1px;min-height: 400px;">
                            <nav class="col-md-12">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">المنتجات</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">الخدمات</a>
                                </div>
                            </nav>
                            <div class="tab-content col-md-12" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row pt-1">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10 pt-5">
                                            <input type="text" id="myFilter" class="form-control mb-2" onkeyup="myFunction()" placeholder="بحث في المنتجات" style="border-radius: 1px">
                                            @if(isset($categories)&&$categories->count()>0)
                                                <div class=" p-2 pt-2" id="myItems">
                                                    @foreach($categories as $category)
                                                        <div class="cardbody">
                                                            @if(isset($category->products)&&count($category->products)>0)
                                                                <h5 class="card p-2" id="{{$category->id}}" style="background-color: #f6f6f6; text-transform: capitalize">{{$category->name}}</h5>
                                                                @foreach($category->products as $product)
                                                                    <div class="cards">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <img height="100" width="100" src="{{asset('images/products/'.$product->image)}}" alt="image">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="row">
                                                                                    <p class="cardtitle col-md-6 text-primary"><strong>{{$product->name}}</strong></p>
                                                                                    <p class="col-md-4">{{$product->price}} جنية /{{$product->unit}}</p>
                                                                                    <p class="col-md-2 text-{{$product->status==0?'danger':'success'}}">{{$product->status==0?'غير متوفر':'متوفر'}}</p>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <button showid="{{$product->id}}" id="{{$product->id}}" class="productDetails btn btn-outline-primary p-1">عرض التفاصيل</button>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                @endforeach
                                                            @endif

                                                        </div>
                                                    @endforeach
                                                    {{-- $restaurants->links()--}}
                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row pt-1">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10 pt-5">
                                            <input type="text" id="myFilter2" class="form-control mb-2" onkeyup="myFunction2()" placeholder="بحث في الخدمات" style="border-radius: 1px">
                                            @if(isset($categories)&&$categories->count()>0)
                                                <div class=" p-2 pt-2" id="myItems2">
                                                    @foreach($categories as $category)
                                                        <div class="cardbody2">
                                                            @if(isset($category->services)&&($category->services)->count()>0)
                                                                <h5 class="card p-2" id="{{$category->id}}" style="background-color: #f6f6f6; text-transform: capitalize">{{$category->name}}</h5>
                                                                @foreach($category->services as $service)
                                                                    <div class="cards2">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <img height="100" width="100" src="{{asset('images/services/'.$service->image)}}" alt="image">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="row">
                                                                                    <p class="cardtitle2 col-md-6 text-primary"><strong>{{$service->name}}</strong></p>
                                                                                    <p class="col-md-4">{{$service->price}} جنية /{{$service->unit}}</p>
                                                                                    <p class="col-md-2 text-{{$service->status==0?'danger':'success'}}">{{$service->status==0?'غير متوفر':'متوفر'}}</p>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <button id="{{$service->id}}" showid="{{$service->id}}" class="serviceDetails btn btn-outline-primary p-1">عرض التفاصيل</button>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                @endforeach
                                                                @else
                                                                <div class="card text-center p-2">لايوجد خدمات لهذا المصنع يمكنك رؤية المنتجات</div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <div id="modalShow">

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
                    };
                    function myFunction() {
                        var input, filter, cards, cardContainer, h5, title, i;
                        input = document.getElementById("myFilter");
                        filter = input.value.toUpperCase();
                        cardContainer = document.getElementById("myItems");
                        cards = cardContainer.getElementsByClassName("cards");
                        for (i = 0; i < cards.length; i++) {
                            title = cards[i].querySelector(".cardbody p.cardtitle");
                            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                                cards[i].style.display = "";
                            } else {
                                cards[i].style.display = "none";
                            }
                        }
                    }

                    function myFunction2() {
                        var input2, filter2, cards2, cardContainer2, h5, title, i;
                        input2 = document.getElementById("myFilter2");
                        filter2 = input2.value.toUpperCase();
                        cardContainer2 = document.getElementById("myItems2");
                        cards2 = cardContainer2.getElementsByClassName("cards2");
                        for (i = 0; i < cards2.length; i++) {
                            title2 = cards2[i].querySelector(".cardbody2 p.cardtitle2");
                            if (title2.innerText.toUpperCase().indexOf(filter2) > -1) {
                                cards2[i].style.display = "";
                            } else {
                                cards2[i].style.display = "none";
                            }
                        }
                    }

                </script>
        </div>
        </div>
    </main><!-- End #main -->
    @endsection