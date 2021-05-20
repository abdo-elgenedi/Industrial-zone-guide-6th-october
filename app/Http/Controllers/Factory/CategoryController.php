<?php

namespace App\Http\Controllers\Factory;

use App\Http\Controllers\Controller;
use App\Models\FactoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){


        $categories=FactoryCategory::where('fact_id',Auth::user()->id)->get();
        return view('factory.categories.index',compact(['categories']));
    }

    public function create(){

        return view('factory.categories.create');
    }

    public function store(Request $request){

        $validation=Validator::make($request->only(['name']),['name'=>['required','string']],
            ['required'=>'هذا الحقل مطلوب','string'=>'يجب ان يكون الاسم حروف وارقام فقط']);
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }
        try {
            FactoryCategory::create([
                'name'=>$request->name,
                'fact_id'=>Auth::user()->id,
            ]);
            return redirect()->route('factory.categories')->with(['message'=>'لقد تم اضافه التصنيف بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('factory.categories')->with(['message'=>'خطأ اثناء اضافه التصنيف برجاء المحاولة مره اخري','color'=>'danger']);
        }

    }

    public function edit($id){

        $category=FactoryCategory::where('fact_id',Auth::user()->id)->find($id);
        if (!$category){
            return redirect()->route('factory.categories')->with(['message'=>'برجاء اختيار التصنيف الصحيح','color'=>'danger']);
        }
        return view('factory.categories.edit',compact(['category']));
    }

    public function update(Request $request){
        $category=FactoryCategory::where('fact_id',Auth::user()->id)->find($request->id);
        if (!$category){
            return redirect()->route('factory.categories')->with(['message'=>'برجاء اختيار التصنيف الصحيح','color'=>'danger']);
        }

        $validation=Validator::make($request->only(['name']),['name'=>['required','string']],
            ['required'=>'هذا الحقل مطلوب','string'=>'يجب ان يكون الاسم حروف وارقام فقط']);
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation->errors());
        }
        try {
           $category->update([
                'name'=>$request->name,
            ]);
            return redirect()->route('factory.categories')->with(['message'=>'تم تعديل التصنيف بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('factory.categories')->with(['message'=>'خطأ اثناء تعديل التصنيف برجاء المحاولة مره اخري','color'=>'danger']);
        }

    }

    public function delete($id){

        $category=FactoryCategory::where('fact_id',Auth::user()->id)->find($id);
        if (!$category){
            return redirect()->route('factory.categories')->with(['message'=>'برجاء اختيار التصنيف الصحيح','color'=>'danger']);
        }

        try {
            $category->delete();
            return redirect()->route('factory.categories')->with(['message'=>'تم حذف التصنيف بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('factory.categories')->with(['message'=>'خطأ اثناء حذف التصنيف برجاء المحاولة مره اخري','color'=>'danger']);
        }


    }
}
