@extends('layouts.factory')
@section('title') Services @endsection
@section('content')


    <h3 class="card text-center p-1 bg-success">إضافة خدمة جديد</h3>
    <div class="bg-white width-80-per p-2 m-auto">
    <form class="form bg-white" method="POST" action="{{route('factory.services.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">أسم الخدمة</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                               placeholder="أسم الخدمة بالكامل" name="name" value="{{@old('name')}}">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price"> سعر الخدمة</label>
                        <input type="number" step=".01" id="price" class="form-control @error('price') is-invalid @enderror"
                               placeholder="سعر الخدمة بالجنيه" name="price" value="{{@old('price')}}">
                        @error('price')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="unit">أسم الوحده</label>
                        <input type="text" id="unit" class="form-control @error('unit') is-invalid @enderror"
                               placeholder="مثال لكل (طن / كيلو / متر / لتر)" name="unit" value="{{@old('unit')}}">
                        @error('unit')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cat_id">تصنيف الخدمة</label>
                        <select id="cat_id" name="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                            <option value="none" selected="" disabled="">اختار تصنيف الخدمة</option>
                            @if(isset($categories)&&$categories->count()>0)
                            @foreach($categories as $category)
                                    <option @if(@old('cat_id')==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('cat_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">برجاء اختيار الصوره الرئيسيه للخدمة </label>
                    </div>
                    @error('image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card-header">
                            <h4 class="card-title">وصف الخدمة</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="form-group">
                                <textarea name="description" class="tinymce"></textarea>
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
                    <div class="input-field mt-4">
                        <div class="image-uploader" style="padding-top: .5rem;"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="form-actions pull-left">
            <a href="{{route('factory.services')}}" class="btn btn-warning mr-1">
                <i class="ft-x"></i> رجوع
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="la la-check-square-o"></i> حفظ
            </button>
        </div>
    </form>
    </div>

    <script>

        window.onload=function () {
            $('.image-uploader').imageUploader({
                label:'يمكنك سحب وادراج الصور او الضغط لاختيار الصور ',
                imagesInputName: 'images',
                preloadedInputName: 'old',
                extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
                maxSize: 5 * 1024 * 1024,
                maxFiles: 7
            });
        }
    </script>
    @endsection