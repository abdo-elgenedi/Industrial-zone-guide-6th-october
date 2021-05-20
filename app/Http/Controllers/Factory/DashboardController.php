<?php

namespace App\Http\Controllers\Factory;

use App\Http\Controllers\Controller;
use App\Http\Requests\FactoryRequest;
use App\Models\Category;
use App\Models\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public function index(){

        return view('factory.index');
    }

    public function getProfile(){

        $factory=Factory::with(['category'])->find(Auth::user()->id);
        $categories=Category::get();
        return view('factory.profile',compact(['categories','factory']));
    }

    public function profile(FactoryRequest $request){

        $factory=Factory::find(Auth::user()->id);
        $oldImage=$factory->image;
        if (isset($request->image)){
            $imageName=Auth::user()->id.time().$request->image->hashName();
        }else{
            $imageName=$oldImage;
        }
        try{
        $factory->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'description'=>$request->description,
            'cat_id'=>$request->cat_id,
            'image'=>$imageName,
        ]);

        if (isset($request->image)){
            try{
                $request->image->move(base_path().'/public/images/factories',$imageName);
                if ($oldImage!='factory.jpg')
                unlink(base_path().'/public/images/factories/'.$oldImage);
            }catch (\Exception $e){}
            }
            return redirect()->route('factory.getprofile')->with(['message'=>'لقد تم تحديث ملفك الشخصي بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('factory.getprofile')->with(['message'=>'فشل تحديث ملفك الشخصي برجاء المحاوله مره اخري','color'=>'danger']);
        }
    }

    public function getPassword(){

        return view('factory.password');
    }

    public function password(Request $request){

        $validation=Validator::make(\request()->only(['password','password_confirmation']),
            ['password'=>['required','confirmed','min:8']],
            ['required'=>'هذا الحقل مطلوب',
                'password.confirmed'=>'كلمة المرور غير متطابقة',
                'password.min'=>'يجب ان يكون كلمة المرور علي الاقل 8 احرف وارقام',
                ]);
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation->errors());
        }
        if (Auth::guard('factory')->validate(['id'=>Auth::user()->id,'password'=>$request->oldpassword])){
            try {
                $factory = Factory::find(Auth::user()->id);
                $factory->password = Hash::make($request->password);
                $factory->save();
                return redirect()->route('factory.getpassword')->with(['message'=>'تم تغيير كلمة المرور بنجاح','color'=>'success']);
            }catch (\Exception $e){
                return redirect()->route('factory.getpassword')->with(['message'=>'خطأ اثناء تحديث كلمة المرور برجاء المحاولة مرة اخري','color'=>'danger']);
            }
        }else{
            return redirect()->route('factory.getpassword')->with(['message'=>'كلمة المرور غير صحيحة تأكد من كلمة المرور وحاول مرة اخري ','color'=>'danger']);
        }
    }
}
