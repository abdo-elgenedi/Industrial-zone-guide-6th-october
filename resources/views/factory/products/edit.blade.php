@extends('layouts.factory')
@section('title') Products @endsection
@section('content')


    <h3 class="card text-center p-1 bg-success">تعديل المنتج ({{$product->name}}) </h3>
    <div class="bg-white width-80-per p-2 m-auto">
        <form class="form bg-white" method="POST" action="{{route('factory.products.update',$product->id)}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">أسم المنتج</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="أسم المنتج بالكامل" name="name" value="{{$product->name}}">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price"> سعر المنتج</label>
                            <input type="number" step=".01" id="price" class="form-control @error('price') is-invalid @enderror"
                                   placeholder="سعر المنتج بالجنيه" name="price" value="{{$product->price}}">
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
                                   placeholder="مثال لكل (طن / كيلو / متر / لتر)" name="unit" value="{{$product->unit}}">
                            @error('unit')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cat_id">تصنيف المنتج</label>
                            <select id="cat_id" name="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                                <option value="none" selected="" disabled="">اختار تصنيف للمنتج</option>
                                @if(isset($categories)&&$categories->count()>0)
                                    @foreach($categories as $category)
                                        <option @if($product->cat_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
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
                                <label class="custom-file-label" for="customFile">برجاء اختيار الصوره الرئيسيه للمنتج </label>
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
                            <h4 class="card-title">وصف المنتج</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="form-group">
                                <textarea name="description" class="tinymce">{{$product->description}}</textarea>
                            </div>
                        </div>
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <label for="cat_id">صور المنتج</label>
                        <div class="input-field mt-4">
                            <div class="image-uploader" style="padding-top: .5rem;"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-actions pull-left">
                <a href="{{route('factory.products')}}" class="btn btn-warning mr-1">
                    <i class="ft-x"></i> رجوع
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> تحديث
                </button>
            </div>
        </form>
    </div>

    <script>
        var preloaded = [
                @foreach($product->images as $image)
            {id:'{{$image->id}}', src: '{{asset('images/products/'.$image->image)}}'},
            @endforeach
        ];
        window.onload=function () {
            $('.image-uploader').imageUploader({
                preloaded: preloaded,
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