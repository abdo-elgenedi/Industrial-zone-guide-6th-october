<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">مراجعة المصنع</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(isset($location->factory)&&$location->factory->count()>0)
                    @if($location->factory->map_status==1)
                        <a href="{{route('admin.map.delete',$location->id)}}" class="btn btn-danger m-3" onclick="if(!confirm('متأكد من ازالة المصنع من الخريطه؟ برجاء الملاحظه بإنة لن يتم حذف حسابة من الموقع تماما')) return false">
                            هذا المصنع مثبت علي الخريطة هل تريد ازالته من الخريطة؟</a>
                        @else
                        <p class="card bg-warning p-1 text-center text-bold-700">هذا المصنع قدم طلب للخريطة ولم تتم الموافقه علية بعد!</p>
                        <div class="row mb-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <a href="{{route('admin.map.accept',$location->id)}}" class="btn btn-success" onclick="if(!confirm('هل تريد تأكيد طلب الانضمام للخريطة بالفعل؟')) return false">قم بتأكيد الطلب</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{route('admin.map.delete',$location->id)}}" class="btn btn-danger" onclick="if(!confirm('هل تريد الغاء طلب الانضمام للخريطة بالفعل؟')) return false">إلغاء الطلب</a>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">صورة المصنع</label>
                                    <img src="{{asset('images/factories/'.$location->factory->image)}}" class="img-fluid form-control" style="height: 200px;overflow: auto"/>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">أسم المصنع</label>
                                    <div class="row">
                                        <p class="form-control col-md-7">{{$location->factory->name}}</p>
                                        <p class="col-md-3 ml-2 mr-2 btn btn-{{$location->factory->status==0?'danger':'success'}}">
                                            {{$location->factory->status==0?'المصنع محجوب':'المصنع نشط'}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">التصنيف</label>
                                    <p class="form-control">{{$location->factory->category->name??'غير مضاف لتصنيف '}}</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">عدد المنتجات</label>
                                    <p class="form-control">{{$location->factory->products_count}}</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">عدد الخدمات</label>
                                    <p class="form-control">{{$location->factory->services_count}}</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">الوصف</label>
                                    <p class="form-control">{{$location->factory->description}}</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">الايميل</label>
                                    <p class="form-control">{{$location->factory->email}}</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="cat_id">ارقام الهاتف</label>
                                @if(isset($location->factory->mobiles)&&$location->factory->mobiles->count()>0)
                                    @foreach($location->factory->mobiles as $mobile)
                                        <p class="form-control">{{$mobile->mobile}}</p>
                                    @endforeach
                                @else
                                    <div class="btn btn-outline-danger text-center">هذا المصنع لايحتوي علي ارقام هاتف</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>