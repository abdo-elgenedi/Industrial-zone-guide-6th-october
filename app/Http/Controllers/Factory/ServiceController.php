<?php

namespace App\Http\Controllers\Factory;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ServiceRequest;
use App\Models\FactoryCategory;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Service;
use App\Models\ServiceImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(){


        $services=Service::where('fact_id',Auth::user()->id)->with(['category'])->get();
        return view('factory.services.index',compact(['services']));
    }

    public function create(){

        $categories=FactoryCategory::where('fact_id',Auth::user()->id)->get();
        return view('factory.services.create',compact(['categories']));
    }

    public function store(ServiceRequest $request){

        if (isset($request->image)){
            $imageName='main_'.Auth::user()->id.time().$request->image->hashName();
        }else{
            return redirect()->route('factory.services')->with(['message'=>'يجب اختيار صوره للخدمة','color'=>'danger']);
        }
        try {
            DB::beginTransaction();
            $id = Service::insertGetId([
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
                $request->image->move(base_path().'/public/images/services/',$imageName);
            }
            $images = collect($request->images);
            if(isset($images)&& sizeof($images)>0) {
                foreach ($images as $index => $image) {
                    $filename=$index.time().$image->hashName();
                    $image->move(base_path().'/public/images/services/',$filename);
                    $images_array[$index] = [
                        'ser_id' => $id,
                        'image' => $filename
                    ];
                }
                ServiceImages::insert($images_array);
            }

            DB::commit();
            return redirect()->route('factory.services')->with(['message' => 'تم اضافة الخدمة بنجاح', 'bg' => 'bg-green', 'color' => 'success']);
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('factory.services')->with(['message' => 'لم يتم اضافة الخدمة رجاء المحاولة مره اخري ', 'color' => 'danger']);
        }


    }

    public function edit($id){

        $service=Service::where('fact_id',Auth::user()->id)->with(['images'])->find($id);
        $categories=FactoryCategory::where('fact_id',Auth::user()->id)->get();
        if (!$service){
            return redirect()->route('factory.services')->with(['message'=>'برجاء اختيار الخدمة الصحيحة','color'=>'danger']);
        }
        return view('factory.services.edit',compact(['service','categories']));
    }

        public function update(ServiceRequest $request){

            $service=Service::find($request->id);
            if(!$service){
                return redirect()->route('factory.services')->with(['message' => 'برجاء اختيار الخدمة الصحيحة','color' => 'danger']);

            }else{
                $oldImage=$service->image;
                if (isset($request->image)){
                    $imageName='main_'.Auth::user()->id.time().$request->image->hashName();
                }else{
                    $imageName=$oldImage;
                }
                try {
                    DB::beginTransaction();
                    $service->update([
                        'name' => $request->name,
                        'price' => $request['price'],
                        'unit' => $request['unit'],
                        'cat_id' => $request['cat_id'],
                        'description' => $request['description'],
                        'image' => $imageName,
                    ]);
                    $olds = collect($request->old)->toArray();
                    {
                        $oldImages=ServiceImages::where('ser_id',$service->id)->whereNotIn('id',$olds)->get();
                        foreach ($oldImages as $image){
                            try {
                                unlink(base_path('public/images/services/' . $image->image));
                            }catch (\Exception $e){}
                            $image->delete();
                        }
                    }

                    if(isset($request->images)&& sizeof($request->images)>0) {
                        foreach ($request->images as $index => $image) {
                            $filename=$index.$image->hashName();
                            $image->move(base_path().'/public/images/services/',$filename);
                            $images_array[$index] = [
                                'ser_id' => $service->id,
                                'image' => $filename
                            ];
                        }
                          ServiceImages::insert($images_array);
                    }

                    if (isset($request->image)){
                        $request->image->move(base_path().'/public/images/services/',$imageName);
                        try {
                            unlink(base_path('public/images/services/' . $oldImage));
                        }catch (\Exception $e){}
                    }
                    DB::commit();
                    return redirect()->route('factory.services')->with(['message' => 'تم تعديل الخدمة بنجاح','color' => 'success']);
                }catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->route('factory.services')->with(['message' => 'لم يتم تعديل الخدمة برجاء المحاوله مره اخري', 'color' => 'danger']);
                }

            }

    }

    public function delete($id){

        $service=Service::where('fact_id',Auth::user()->id)->with(['images'])->find($id);
        $images=ServiceImages::where('ser_id',$id)->get();
        $oldImage=$service->image;
        if (!$service){
            return redirect()->route('factory.services')->with(['message'=>'برجاء اختيار الخدمة الصحيحة','color'=>'danger']);
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

            return redirect()->route('factory.services')->with(['message'=>'تم حذف الخدمة بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('factory.services')->with(['message'=>'خطأ اثناء حذف الخدمة برجاء المحاولة مره اخري','color'=>'danger']);
        }


    }

    public function show(Request $request){
        $service=Service::where('fact_id',Auth::user()->id)->with(['images','category'])->find($request->id);
        $view=view('factory.services.detailsmodal',compact(['service']))->render();
        return response()->json([
            'modal'=>$view
        ]);
    }


    public function status(Request $request){

        $service=Service::where('fact_id',Auth::user()->id)->find($request->id);
        if (!$service){
            return response()->json(null,404);
        }
        try {
            if ($service->status == 0) {
                $service->status = 1;
                $status = 'active';
            } else {
                $service->status = 0;
                $status = 'notactive';
            }

            $service->save();
            return response()->json([
                'status' => $status,
                'code' => 200,
            ]);
        }catch (\Exception $e){
            return response()->json(null,500);
        }
    }
}
