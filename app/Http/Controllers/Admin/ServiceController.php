<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factory;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Service;
use App\Models\ServiceImages;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){


        $services=Service::with(['category','factory'=>function($q){
            $q->select('id','name');
        },'images'])->get();
        return view('admin.services.index',compact(['services']));
    }

    public function delete($id){

        $service=Service::with(['images'])->find($id);
        $images=ServiceImages::where('ser_id',$id)->get();
        $oldImage=$service->image;
        if (!$service){
            return redirect()->route('admin.services')->with(['message'=>'برجاء اختيار الخدمة الصحيح','color'=>'danger']);
        }

        try {
            $service->delete();
            foreach ($images as $image){
                try{
                    unlink(base_path('public/images/services/' . $image->image));
                }catch (\Exception $e){}
                $image->delete();

            }
            try{
                unlink(base_path('public/images/services/' . $oldImage));
            }catch (\Exception $e){}

            return redirect()->route('admin.services')->with(['message'=>'تم حذف الخدمة بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('admin.services')->with(['message'=>'خطأ اثناء حذف الخدمة برجاء المحاولة مره اخري','color'=>'danger']);
        }


    }

    public function show(Request $request){
        $service=Service::with([
            'images','category',
            'factory'=>function($q){
            $q->select('id','name','image','email')->with(['mobiles','category']);
            }])->find($request->id);
        $view=view('admin.services.detailsmodal',compact(['service']))->render();
        return response()->json([
            'modal'=>$view
        ]);
    }

}
