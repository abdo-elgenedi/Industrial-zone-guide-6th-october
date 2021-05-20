<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FactoryRegisterController extends Controller
{

    public function getRegister(){

        return view('factory.register');
    }

    public function register(Request $request){

        $validateFactory=Validator::make($request->only(['name','description','cat_id','email','password','password_confirmation']),
            [
                'name'=>['string','required'],
                'description'=>['required','string'],
                'cat_id'=>['required','exists:categories,id'],
                'email'=>['required','email','unique:factories'],
                'password'=>['required','min:8','confirmed'],

            ],
            [
                'required'=>'هذا الحقل مطلوب',
                'string'=>'يجب ان يكون الحقل حروف وارقام ورموز فقط',
                'exists'=>'برجاء اختيار تصنيف صحيح من القائمة',
                'email'=>'البريد الالكتروني غير صالح',
                'unique'=>'البريد الالكتروني يخص مصنع اخر',
                'min'=>'يجب ان اتكون كلمة المرور 8 احرف وارقام علي الاقل',
                'confirmed'=>'كلمة المرور غير متطابقة',
            ]);

        if ($validateFactory->fails()){
            return redirect()->back()->withInput()->withErrors($validateFactory->errors());
        }

        Factory::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>'factory.jpg',
            'cat_id'=>$request->cat_id,
            'email'=>$request->email,
            'status'=>0,
            'map_status'=>0,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('factory.login')->with(['error'=>'لقد تم انشاء حسابك بالفعل ولكن يجب ان يوافق علية المسوؤل اولا ']);
    }
}
