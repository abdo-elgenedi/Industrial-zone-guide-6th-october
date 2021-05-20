<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factory;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::get();
        return view('admin.users.index',compact(['users']));
    }



    public function status(Request $request){

        $user=User::find($request->id);
        if (!$user){
            return response()->json(null,404);
        }
        try {
            if ($user->status == 0) {
                $user->status = 1;
                $status = 'active';
            } else {
                $user->status = 0;
                $status = 'notactive';
            }

            $user->save();
            return response()->json([
                'status' => $status,
                'code' => 200,
            ]);
        }catch (\Exception $e){
            return response()->json(null,500);
        }
    }

    public function delete($id){
        $user=User::find($id);
        if (!$user){
            return redirect()->route('admin.users')->with(['message'=>'برجاء اختيار المستخدم الصحيح','color'=>'danger']);
        }
        try {
            $user->delete();
            return redirect()->route('admin.users')->with(['message'=>'تم حذف المستخدم بنجاح','color'=>'danger']);
        }catch (\Exception $e){
            return redirect()->route('admin.users')->with(['message'=>'خطأ في حذف المستخدم برجاء المحاولة مره اخري','color'=>'danger']);

        }

    }
}
