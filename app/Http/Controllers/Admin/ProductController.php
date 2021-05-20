<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factory;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){


        $products=Product::with(['category','factory'=>function($q){
            $q->select('id','name');
        },'images'])->get();
        return view('admin.products.index',compact(['products']));
    }

    public function delete($id){

        $product=Product::with(['images'])->find($id);
        $images=ProductImages::where('pro_id',$id)->get();
        $oldImage=$product->image;
        if (!$product){
            return redirect()->route('admin.products')->with(['message'=>'برجاء اختيار المنتج الصحيح','color'=>'danger']);
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

            return redirect()->route('admin.products')->with(['message'=>'تم حذف المنتج بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('admin.products')->with(['message'=>'خطأ اثناء حذف المنتج برجاء المحاولة مره اخري','color'=>'danger']);
        }


    }

    public function show(Request $request){
        $product=Product::with([
            'images','category',
            'factory'=>function($q){
            $q->select('id','name','image','email')->with(['mobiles','category']);
            }])->find($request->id);
        $view=view('admin.products.detailsmodal',compact(['product']))->render();
        return response()->json([
            'modal'=>$view
        ]);
    }

}
