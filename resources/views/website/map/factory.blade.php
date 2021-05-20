<div class="modal animated slideInDown show" id="factoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel77">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel77">تفاصيل المصنع</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
               @if(isset($factory->factory)&&$factory->factory->count()>0)
                   <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">صورة المصنع</label>
                                <img src="{{asset('images/factories/'.$factory->factory->image)}}" class="img-fluid form-control" style="height: 200px;overflow: auto"/>
                            </div>
                        </div>

                        <p>لزيارة صفحة المصنع <a href="{{route('website.show.factory',$factory->factory->id)}}">اضغط هنا</a></p>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">أسم المصنع</label>
                                <div class="row">
                                    <p class="form-control col-md-7">{{$factory->factory->name}}</p>
                                    <p class="col-md-3 mr-2 form-control btn btn-{{$factory->factory->status==0?'danger':'success'}}">
                                        {{$factory->factory->status==0?'المصنع محجوب':'المصنع نشط'}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">التصنيف</label>
                                <p class="form-control">{{$factory->factory->category->name??'غير مضاف لتصنيف '}}</p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">الوصف</label>
                                <p class="card p-2">{{$factory->factory->description}}</p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">الايميل</label>
                                <p class="form-control">{{$factory->factory->email}}</p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="cat_id">ارقام الهاتف</label>
                            @if(isset($factory->factory->mobiles)&&$factory->factory->mobiles->count()>0)
                                @foreach($factory->factory->mobiles as $mobile)
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
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

