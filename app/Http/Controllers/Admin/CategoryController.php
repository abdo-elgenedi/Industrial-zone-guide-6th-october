<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FactoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){


        $categories=Category::get();
        return view('admin.categories.index',compact(['categories']));
    }

    public function create(){

        return view('admin.categories.create');
    }

    public function store(Request $request){

        $validation=Validator::make($request->only(['name','color']),['name'=>['required','string'],'color'=>['required']],
            ['required'=>'هذا الحقل مطلوب','string'=>'يجب ان يكون الاسم حروف وارقام فقط']);
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }
        try {
            Category::create([
                'name'=>$request->name,
                'color'=>$request->color,
            ]);
            return redirect()->route('admin.categories')->with(['message'=>'لقد تم اضافه التصنيف بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('admin.categories')->with(['message'=>'خطأ اثناء اضافه التصنيف برجاء المحاولة مره اخري','color'=>'danger']);
        }

    }

    public function edit($id){

        $category=Category::find($id);
        if (!$category){
            return redirect()->route('admin.categories')->with(['message'=>'برجاء اختيار التصنيف الصحيح','color'=>'danger']);
        }
        return view('admin.categories.edit',compact(['category']));
    }

    public function update(Request $request){
        $category=Category::find($request->id);
        if (!$category){
            return redirect()->route('admin.categories')->with(['message'=>'برجاء اختيار التصنيف الصحيح','color'=>'danger']);
        }

        $validation=Validator::make($request->only(['name','color']),['name'=>['required','string'],'color'=>['required']],
            ['required'=>'هذا الحقل مطلوب','string'=>'يجب ان يكون الاسم حروف وارقام فقط']);
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation->errors());
        }
        try {
           $category->update([
                'name'=>$request->name,
               'color'=>$request->color
            ]);
            return redirect()->route('admin.categories')->with(['message'=>'تم تعديل التصنيف بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('admin.categories')->with(['message'=>'خطأ اثناء تعديل التصنيف برجاء المحاولة مره اخري','color'=>'danger']);
        }

    }

    public function delete($id){

        $category=Category::find($id);
        if (!$category){
            return redirect()->route('admin.categories')->with(['message'=>'برجاء اختيار التصنيف الصحيح','color'=>'danger']);
        }

        try {
            $category->delete();
            return redirect()->route('admin.categories')->with(['message'=>'تم حذف التصنيف بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('admin.categories')->with(['message'=>'خطأ اثناء حذف التصنيف برجاء المحاولة مره اخري','color'=>'danger']);
        }


    }
}
