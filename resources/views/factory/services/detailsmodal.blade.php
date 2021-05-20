<div class="modal animated slideInDown show" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel77">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel77">تفاصيل الخدمة</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
               @if(isset($service)&&$service->count()>0)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">أسم الخدمة</label>
                                <p class="form-control">{{$service->name}}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price"> سعر الخدمة</label>
                                <p class="form-control">{{$service->price}} جنيه / {{$service->unit}}</p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">نوع الصنف</label>
                            <p class="form-control">{{$service->category->name}}</p>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-header">
                                <h4 class="card-title">وصف الخدمة</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="form-group card bg-light p-2">
                                    {!! $service->description !!}
                                </div>
                            </div>
                            @error('description')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <label for="cat_id">صور الخدمة</label>
                            @if(isset($service->images)&&$service->images->count()>0)
                                <div class="input-field mt-4 row">
                                    @foreach($service->images as $image)
                                    <img class="rounded img-fluid float-left m-auto p-3" src="{{asset('images/services/'.$image->image)}}">
                                        @endforeach
                                </div>
                                @else
                            @endif
                        </div>
                    </div>
                   @else

                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

