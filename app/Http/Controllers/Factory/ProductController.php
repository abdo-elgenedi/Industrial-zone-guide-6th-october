<?php

namespace App\Http\Controllers\Factory;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\FactoryCategory;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(){


        $products=Product::where('fact_id',Auth::user()->id)->with(['category'])->get();
        return view('factory.products.index',compact(['products']));
    }

    public function create(){

        $categories=FactoryCategory::where('fact_id',Auth::user()->id)->get();
        return view('factory.products.create',compact(['categories']));
    }

    public function store(ProductRequest $request){

        if (isset($request->image)){
            $imageName='main_'.Auth::user()->id.time().$request->image->hashName();
        }else{
            return redirect()->route('factory.products')->with(['message'=>'يجب اختيار صوره للمنتج','color'=>'danger']);
        }
        try {
            DB::beginTransaction();
            $id = Product::insertGetId([
                'name' => $request->name,
                'price' => $request['price'],
                'unit' => $request['unit'],
                'cat_id' => $request['cat_id'],
                'description' => $request['description'],
                'fact_id' => Auth::user()->id,
                'status' => 1,
                'image' => $imageName,
            ]);

            if (isset($request->image)){
                $request->image->move(base_path().'/public/images/products/',$imageName);
            }
            $images = collect($request->images);
            if(isset($images)&& sizeof($images)>0) {
                foreach ($images as $index => $image) {
                    $filename=$index.time().$image->hashName();
                    $image->move(base_path().'/public/images/products/',$filename);
                    $images_array[$index] = [
                        'pro_id' => $id,
                        'image' => $filename
                    ];
                }
                ProductImages::insert($images_array);
            }

            DB::commit();
            return redirect()->route('factory.products')->with(['message' => 'تم اضافة المنتج بنجاح', 'bg' => 'bg-green', 'color' => 'success']);
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('factory.products')->with(['message' => 'لم يتم اضافة المنتج رجاء المحاولة مره اخري ', 'color' => 'danger']);
        }


    }

    public function edit($id){

        $product=Product::where('fact_id',Auth::user()->id)->with(['images'])->find($id);
        $categories=FactoryCategory::where('fact_id',Auth::user()->id)->get();
        if (!$product){
            return redirect()->route('factory.products')->with(['message'=>'برجاء اختيار المنتج الصحيح','color'=>'danger']);
        }
        return view('factory.products.edit',compact(['product','categories']));
    }

        public function update(ProductRequest $request){
            $product=Product::find($request->id);
            if(!$product){
                return redirect()->route('factory.products')->with(['message' => 'برجاء اختيار المنتج الصحيح','color' => 'danger']);

            }else{
                $oldImage=$product->image;
                if (isset($request->image)){
                    $imageName='main_'.Auth::user()->id.time().$request->image->hashName();
                }else{
                    $imageName=$oldImage;
                }
                try {
                    DB::beginTransaction();
                    $product->update([
                        'name' => $request->name,
                        'price' => $request['price'],
                        'unit' => $request['unit'],
                        'cat_id' => $request['cat_id'],
                        'description' => $request['description'],
                        'image' => $imageName,
                    ]);
                    $olds = collect($request->old)->toArray();
                    {
                        $oldImages=ProductImages::where('pro_id',$product->id)->whereNotIn('id',$olds)->get();
                        foreach ($oldImages as $image){
                            try {
                                unlink(base_path('public/images/products/' . $image->image));
                            }catch (\Exception $e){}
                            $image->delete();
                        }
                    }

                    if(isset($request->images)&& sizeof($request->images)>0) {
                        foreach ($request->images as $index => $image) {
                            $filename=$index.$image->hashName();
                            $image->move(base_path().'/public/images/products/',$filename);
                            $images_array[$index] = [
                                'pro_id' => $product->id,
                                'image' => $filename
                            ];
                        }
                          ProductImages::insert($images_array);
                    }

                    if (isset($request->image)){
                        $request->image->move(base_path().'/public/images/products/',$imageName);
                        try {
                            unlink(base_path('public/images/products/' . $oldImage));
                        }catch (\Exception $e){}
                    }
                    DB::commit();
                    return redirect()->route('factory.products')->with(['message' => 'تم تعديل المنتج بنجاح','color' => 'success']);
                }catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->route('factory.products')->with(['message' => 'لم يتم تعديل المنتج برجاء المحاوله مره اخري', 'color' => 'danger']);
                }

            }

    }

    public function delete($id){

        $product=Product::where('fact_id',Auth::user()->id)->with(['images'])->find($id);
        $images=ProductImages::where('pro_id',$id)->get();
        $oldImage=$product->image;
        if (!$product){
            return redirect()->route('factory.products')->with(['message'=>'برجاء اختيار المنتج الصحيح','color'=>'danger']);
        }

        try {
            $product->delete();
            foreach ($images as $image){
                try{
                    unlink(base_path('public/images/products/' . $image->image));
                }catch (\Exception $e){}
                $image->delete();

            }
            try{
                unlink(base_path('public/images/products/' . $oldImage));
            }catch (\Exception $e){}

            return redirect()->route('factory.products')->with(['message'=>'تم حذف المنتج بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('factory.products')->with(['message'=>'خطأ اثناء حذف المنتج برجاء المحاولة مره اخري','color'=>'danger']);
        }


    }

    public function show(Request $request){
        $product=Product::where('fact_id',Auth::user()->id)->with(['images','category'])->find($request->id);
        $view=view('factory.products.detailsmodal',compact(['product']))->render();
        return response()->json([
            'modal'=>$view
        ]);
    }


    public function status(Request $request){

        $product=Product::where('fact_id',Auth::user()->id)->find($request->id);
        if (!$product){
            return response()->json(null,404);
        }
        try {
            if ($product->status == 0) {
                $product->status = 1;
                $status = 'active';
            } else {
                $product->status = 0;
                $status = 'notactive';
            }

            $product->save();
            return response()->json([
                'status' => $status,
                'code' => 200,
            ]);
        }catch (\Exception $e){
            return response()->json(null,500);
        }
    }
}
