<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::Admin;
    public function getLogin(){

        return view('admin.login');
    }
  public function login(Request $request)
  {
      if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
          return redirect()->intended('/admin');
      }else{
          return redirect()->back()->with(['message'=>'  هناك خطا في بيانات الدخول']);
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

        return $this->loggedOut($request) ?: redirect('/admin');
    }
}
