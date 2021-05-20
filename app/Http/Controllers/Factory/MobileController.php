<?php

namespace App\Http\Controllers\Factory;

use App\Http\Controllers\Controller;
use App\Models\FactoryCategory;
use App\Models\Mobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MobileController extends Controller
{
    public function index(){


        $mobiles=Mobile::where('fact_id',Auth::user()->id)->get();
        return view('factory.mobiles.index',compact(['mobiles']));
    }

    public function create(){

        return view('factory.mobiles.create');
    }

    public function store(Request $request){

        $validation=Validator::make($request->only(['mobile']),['mobile'=>['required','string']],
            ['required'=>'هذا الحقل مطلوب','string'=>'يجب ان يكون رقم الهاتف حروف وارقام فقط']);
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }
        try {
            Mobile::create([
                'mobile'=>$request->mobile,
                'fact_id'=>Auth::user()->id,
            ]);
            return redirect()->route('factory.mobiles')->with(['message'=>'لقد تم اضافه رقم الهاتف بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('factory.mobiles')->with(['message'=>'خطأ اثناء اضافه رقم الهاتف برجاء المحاولة مره اخري','color'=>'danger']);
        }

    }

    public function edit($id){

        $mobile=Mobile::where('fact_id',Auth::user()->id)->find($id);
        if (!$mobile){
            return redirect()->route('factory.mobiles')->with(['message'=>'برجاء اختيار رقم الهاتف الصحيح','color'=>'danger']);
        }
        return view('factory.mobiles.edit',compact(['mobile']));
    }

    public function update(Request $request){
        $mobile=Mobile::where('fact_id',Auth::user()->id)->find($request->id);
        if (!$mobile){
            return redirect()->route('factory.mobiles')->with(['message'=>'برجاء اختيار رقم الهاتف الصحيح','color'=>'danger']);
        }

        $validation=Validator::make($request->only(['mobile']),['mobile'=>['required','string']],
            ['required'=>'هذا الحقل مطلوب','string'=>'يجب ان يكون رقم الهاتف حروف وارقام فقط']);
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation->errors());
        }
        try {
           $mobile->update([
                'mobile'=>$request->mobile,
            ]);
            return redirect()->route('factory.mobiles')->with(['message'=>'تم تعديل رقم الهاتف بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('factory.mobiles')->with(['message'=>'خطأ اثناء تعديل رقم الهاتف برجاء المحاولة مره اخري','color'=>'danger']);
        }

    }

    public function delete($id){

        $mobile=Mobile::where('fact_id',Auth::user()->id)->find($id);
        if (!$mobile){
            return redirect()->route('factory.mobiles')->with(['message'=>'برجاء اختيار التصنيف الصحيح','color'=>'danger']);
        }

        try {
            $mobile->delete();
            return redirect()->route('factory.mobiles')->with(['message'=>'تم حذف رقم الهاتف بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('factory.mobiles')->with(['message'=>'خطأ اثناء حذف رقم الهاتف برجاء المحاولة مره اخري','color'=>'danger']);
        }


    }
}
