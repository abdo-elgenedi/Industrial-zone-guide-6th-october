<?php

namespace App\Http\Controllers\Factory;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    public function map(){

         $maps = Block::with(['factory'=>function($q){
           $q->select('id','name','cat_id')->with(['category'=>function($q){
               $q->select('id','color');
           }]);
       }])->get();
        return view('factory.location.edit',compact(['maps']));
    }

    public function delete(Request $request){

        $location=Block::where('fact_id',Auth::user()->id)->find($request->id);
        if (!$location){
            $modal=view('factory.includes.modal')->with(['message'=>'لم نتستطع التحقق من انك مالك الموقع حاول مره اخري',
                'title'=>'خطأ اثناء عمليه الحذف',
                'color'=>'danger'])->render();
            return response()->json([
                'type'=>'fail',
                'modal'=>$modal,
            ]);
        }
        try{
            $location->update(['fact_id'=>NULL]);
            $modal=view('factory.includes.modal')->with(['message'=>'لقد تم مسح مصنعك من هذا الموقع قم باعاده تحميل الصفحه لتحديث الخريطه ',
                'title'=>'تم الحذف بنجاح',
                'color'=>'success'])->render();
            return response()->json([
                'type'=>'success',
                'modal'=>$modal,
            ]);
        }catch (\Exception $e){
            $modal=view('factory.includes.modal')->with(['message'=>'حدث خطأ اثناء معالجه طلبك , برجاء المحاوله مره اخري  ',
                'title'=>'خطأ في تنفيذ الطلب',
                'color'=>'danger'])->render();
            return response()->json([
                'type'=>'fail',
                'modal'=>$modal,
            ]);
        }
    }

    public function add(Request $request){

        $location=Block::where('fact_id',NULL)->find($request->id);
        if (!$location){
            $modal=view('factory.includes.modal')->with(['message'=>'معذره لقد تم التحقق من الموقع وهو مملوك لشخص اخر',
                'title'=>'خطأ في وضع مصنعك',
                'color'=>'danger'])->render();
            return response()->json([
                'type'=>'fail',
                'modal'=>$modal,
            ]);
        }
        try{
            $location->update(['fact_id'=>Auth::user()->id]);
            $factory=Factory::find(Auth::user()->id);
            $factory->map_status=0;$factory->save();
            $modal=view('factory.includes.modal')->with(['message'=>'لقد تم اضافه موقعك الي الخريطه ولكن في انتظار الموافقه من قبل الاداره أولا قم بإعاده تحميل الصفحه لتحديث الخريطه ',
                'title'=>'تم الاضافه بنجاح',
                'color'=>'success'])->render();
            return response()->json([
                'type'=>'success',
                'modal'=>$modal,
            ]);
        }catch (\Exception $e){
            $modal=view('factory.includes.modal')->with(['message'=>'حدث خطأ اثناء معالجه طلبك , برجاء المحاوله مره اخري  ',
                'title'=>'خطأ في تنفيذ الطلب',
                'color'=>'danger'])->render();
            return response()->json([
                'type'=>'fail',
                'modal'=>$modal,
            ]);
        }
    }
}
