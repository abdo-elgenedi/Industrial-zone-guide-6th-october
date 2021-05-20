<div class="modal animated slideInDown show" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel77">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel77">تفاصيل المنتج</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row p-1">
                    <div class="col-md-7 p-1 m-1" style="border: solid ">
                        <p class="card bg-dark p-2 text-center text-white text-bold-700">بيانات المنتج</p>
               @if(isset($product)&&$product->count()>0)
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">صورة المنتج</label>
                                <img src="{{asset('images/products/'.$product->image)}}" class="img-fluid form-control" style="height: 200px;overflow: auto"/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">أسم المنتج</label>
                                <p class="form-control" style="overflow: auto">{{$product->name}}</p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price"> سعر المنتج</label>
                                <p class="form-control" style="overflow: auto">{{$product->price}} جنيه / {{$product->unit}}</p>
                            </div>
                        </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="price">نوع الصنف</label>
                            <p class="form-control" style="overflow: auto">{{$product->category->name}}</p>
                        </div>
                    </div>
                        <div class="col-12">
                            <div class="card-header">
                                <h4 class="card-title">وصف المنتج</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="form-group card bg-light p-2" style="overflow: auto">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            @error('description')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="cat_id">صور المنتج</label>
                            @if(isset($product->images)&&$product->images->count()>0)
                                <div class="input-field mt-4 row">
                                    @foreach($product->images as $image)
                                    <img class=" img-fluid float-left m-auto p-3" src="{{asset('images/products/'.$image->image)}}">
                                        @endforeach
                                </div>
                                @else
                                <p class="card bg-white p-2 text-danger text-bold-700"> لايوجد صور لهذا المنتج</p>
                            @endif
                        </div>
                    </div>
                   @else

                @endif
            </div>
                        <div class="col-md-4 p-1 m-1" style="border: solid ">
                            <p class="card bg-dark p-2 text-center text-white text-bold-700">بيانات المصنع</p>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">صورة المصنع</label>
                                        <img src="{{asset('images/factories/'.$product->factory->image)}}" class="img-fluid form-control" style="height: 200px"/>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">أسم المصنع</label>
                                        <p class="form-control" style="overflow: auto">{{$product->factory->name}}</p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">التصنيف</label>
                                        <p class="form-control" style="overflow: auto">{{$product->category->name??'غير مضاف لتصنيف'}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">البريد الالكتروني</label>
                                        <p class="form-control" style="overflow: auto">{{$product->factory->email}}</p>
                                    </div>
                                </div>
                            </div>
                        @if(isset($product->factory->mobiles)&&$product->factory->mobiles->count()>0)
                            @foreach($product->factory->mobiles as $mobile)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price">الهاتف رقم {{$loop->index+1}}</label>
                                            <p class="form-control" style="overflow: auto">{{$mobile->mobile}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

