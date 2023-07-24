<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function login(Request $request){
        if ($request->isMethod('POST')){
            if (Auth::attempt(['email'=>$request->email,"password"=>$request->password])){
                return redirect()->route('student');
            }else{
                Session::flash('error','sai mật khẩu hoặc email');
                return redirect()->route('router_login');
            }
        }
           return view('Auth.Login');
    }
    public function logout(){
        Auth::Logout();
        return redirect()->route('router_login');
    }
}
