<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FactoryLoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::Factory;
    public function getLogin(){

        return view('factory.login');
    }
  public function login(Request $request)
  {
      if (Auth::guard('factory')->validate(['email'=>$request->email,'password'=>$request->password])){

              if (Auth::guard('factory')->validate(['email'=>$request->email,'password'=>$request->password,'status'=>0])){
                  return redirect()->back()->with(['error'=>'غير مصرح لك بالدخول في الوقت الحالي يمكنك التواصل معنا']);
              }else{
                  Auth::guard('factory')->attempt(['email'=>$request->email,'password'=>$request->password]);
                  return redirect()->intended('/factory');
              }

      }else{
          return redirect()->back()->with(['error'=>'  هناك خطا في بيانات الدخول']);
      }
  }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/factory');
    }
}
