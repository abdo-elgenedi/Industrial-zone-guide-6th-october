<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public function index(){

        return view('admin.index');
    }

    public function getProfile(){

        $admin=Admin::find(Auth::user()->id);
        return view('admin.profile',compact(['admin']));
    }

    public function profile(AdminRequest $request){

        $admin=Admin::find(Auth::user()->id);
        $oldImage=$admin->image;
        if (isset($request->image)){
            $imageName=Auth::user()->id.time().$request->image->hashName();
        }else{
            $imageName=$oldImage;
        }
        try{
            $admin->update([
                'name'=>$request->name,
                'username'=>$request->username,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'image'=>$imageName,
            ]);

            if (isset($request->image)){
                try{
                    $request->image->move(base_path().'/public/images/admins',$imageName);
                    if ($oldImage!='admin.jpg')
                        unlink(base_path().'/public/images/admins/'.$oldImage);
                }catch (\Exception $e){}
            }
            return redirect()->route('admin.getprofile')->with(['message'=>'لقد تم تحديث ملفك الشخصي بنجاح','color'=>'success']);
        }catch (\Exception $e){
            return redirect()->route('admin.getprofile')->with(['message'=>'فشل تحديث ملفك الشخصي برجاء المحاوله مره اخري','color'=>'danger']);
        }
    }

    public function getPassword(){

        return view('admin.password');
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
        if (Auth::guard('admin')->validate(['id'=>Auth::user()->id,'password'=>$request->oldpassword])){
            try {
                $admin = Admin::find(Auth::user()->id);
                $admin->password = Hash::make($request->password);
                $admin->save();
                return redirect()->route('admin.getpassword')->with(['message'=>'تم تغيير كلمة المرور بنجاح','color'=>'success']);
            }catch (\Exception $e){
                return redirect()->route('admin.getpassword')->with(['message'=>'خطأ اثناء تحديث كلمة المرور برجاء المحاولة مرة اخري','color'=>'danger']);
            }
        }else{
            return redirect()->route('admin.getpassword')->with(['message'=>'كلمة المرور غير صحيحة تأكد من كلمة المرور وحاول مرة اخري ','color'=>'danger']);
        }
    }
}
