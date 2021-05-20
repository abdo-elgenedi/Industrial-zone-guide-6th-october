<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factory;
use Illuminate\Http\Request;

class FactoryController extends Controller
{
    public function index(){
        $factories=Factory::with(['category'])->get();
        return view('admin.factories.index',compact(['factories']));
    }


    public function show(Request $request){
        $factory=Factory::with(['mobiles','category'])->find($request->id);
        $view=view('admin.factories.detailsmodal',compact(['factory']))->render();
        return response()->json([
            'modal'=>$view
        ]);
    }


    public function status(Request $request){

        $factory=Factory::find($request->id);
        if (!$factory){
            return response()->json(null,404);
        }
        try {
            if ($factory->status == 0) {
                $factory->status = 1;
                $status = 'active';
            } else {
                $factory->status = 0;
                $status = 'notactive';
            }

            $factory->save();
            return response()->json([
                'status' => $status,
                'code' => 200,
            ]);
        }catch (\Exception $e){
            return response()->json(null,500);
        }
    }

    public function delete($id){
        $factory=Factory::find($id);
        if (!$factory){
            return redirect()->route('admin.factories')->with(['message'=>'برجاء اختيار المصنع الصحيح','color'=>'danger']);
        }
        try {
            $factory->delete();
            return redirect()->route('admin.factories')->with(['message'=>'تم حذف المصنع بكل مايحتويه من تصنيفات ومنتجات وخدمات وصور','color'=>'danger']);
        }catch (\Exception $e){
            return redirect()->route('admin.factories')->with(['message'=>'خطأ في حذف المصنع برجاء المحاولة مره اخري','color'=>'danger']);

        }

    }
}
