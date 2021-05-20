<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function map(){

         $maps = Block::with(['factory'=>function($q){
           $q->select('id','name','cat_id','map_status')->with(['category'=>function($q){
               $q->select('id','color');
           }]);
       }])->get();
        return view('admin.location.edit',compact(['maps']));
    }

    public function show(Request $request){

        $location=Block::with(['factory'=>function($q){
            $q->with(['category','mobiles'])->withCount(['products','services']);
        }
        ])->find($request->id);
        if (!$location){
            $modal=view('admin.includes.modal')->with(['message'=>'هذا الموقع غير موجود علي الخريطة',
                'title'=>'خطأ اثناء عمليه البحث',
                'color'=>'danger'])->render();
            return response()->json([
                'type'=>'fail',
                'modal'=>$modal,
            ]);
        }if (!(isset($location->factory))){
            $modal=view('admin.includes.modal')->with(['message'=>'لايوجد مصنع في هذا الموقع بالفعل ',
                'title'=>'خطأ اثناء عمليه البحث',
                'color'=>'danger'])->render();
            return response()->json([
                'type'=>'fail',
                'modal'=>$modal,
            ]);
        }
        $modal=view('admin.location.search',compact(['location']))->render();
        return response()->json([
            'type'=>'success',
            'modal'=>$modal,
        ]);
    }

    public function delete($id){

        $location=Block::with('factory')->find($id);

        if (!$location){
            return redirect()->route('admin.map')->with(['message'=>'هذا الموقع غير موجود علي الخريطة', 'color'=>'danger']);
        }
        if (!(isset($location->factory))){
            return redirect()->route('admin.map')->with(['message'=>'لايوجد مصنع في هذا الموقع بالفعل','color'=>'danger']);
        }
        $factory=Factory::find($location->fact_id);
        $factory->map_status=0;
        $location->fact_id=NULL;
        try{
            DB::beginTransaction();
            $factory->save();
            $location->save();
            DB::commit();
            return redirect()->route('admin.map')->with(['message'=>'تم ازالة المصنع من علي الخريطة بنجاح','color'=>'success']);
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.map')->with(['message'=>'خطأ اثناء ازالة المصنع برجاء المحاولة مره اخري','color'=>'danger']);
        }
    }

    public function accept($id){

        $location=Block::with('factory')->find($id);

        if (!$location){
            return redirect()->route('admin.map')->with(['message'=>'هذا الموقع غير موجود علي الخريطة', 'color'=>'danger']);
        }
        if (!(isset($location->factory))){
            return redirect()->route('admin.map')->with(['message'=>'لايوجد مصنع في هذا الموقع بالفعل','color'=>'danger']);
        }
        $factory=Factory::find($location->fact_id);
        $factory->map_status=1;
        try{
            DB::beginTransaction();
            $factory->save();
            DB::commit();
            return redirect()->route('admin.map')->with(['message'=>'تم ازالة المصنع من علي الخريطة بنجاح','color'=>'success']);
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.map')->with(['message'=>'خطأ اثناء ازالة المصنع برجاء المحاولة مره اخري','color'=>'danger']);
        }
    }


    public function getBlock(){

        $maps=Block::get();
        return view('admin.location.blocks',compact(['maps']));
    }

    public function block(Request $request){
        $block=Block::find($request->id);
        $exsist=Block::where('name',$request->name)->first();

        if (!$block){
            $modal=view('admin.includes.modal')->with(['title'=>'الموقع غير صحيح','color'=>'red','message'=>'برجاء اختيار الموقع الصحيح'])->render();
            return response()->json([
                'status'=>'notfound',
                'modal'=>$modal,
            ]);
        }
        if (!$exsist){
            try {
                $block->name=$request->name;
                $block->save();
                $modal = view('admin.includes.modal')->with(['title' => 'تم', 'color' => 'green', 'message' => 'تم تعديل الاسم بنجاح'])->render();
                return response()->json([
                    'status' => 'done',
                    'modal' => $modal,
                    'id' => $block->id,
                ]);
            }catch(\Exception $e){
                $modal=view('admin.includes.modal')->with(['title'=>'خطأ في التحديث','color'=>'red','message'=>'فشل تحديث اسم القطعة برجاء المحاوله مره اخري'])->render();
                return response()->json([
                    'status'=>'notfound',
                    'modal'=>$modal,
                ]);
            }
        }

        $modal=view('admin.includes.modal')->with(['title'=>'الاسم موجود بالفعل','color'=>'red','message'=>'اسم الموقع موجود بالفعل لموقع اخر برجاء ادخال الاسم الصحيح'])->render();
        return response()->json([
            'status'=>'found',
            'modal'=>$modal,
        ]);
    }


}
