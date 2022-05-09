<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function getLogin(){
        return view("backend/login");
        
    }
    public function postLogin(LoginRequest $loginRequest){
        // $rules =[
        //     "email"=>"required|email",
        //     "password"=>"required|min:3|max:6"
        // ];
        // $messegs=[
        //     "email.required"=>"Email không được để trống",
        //     "email.email"=>"Email không hợp lệ",
        //     "password.required"=>"password không được để trống",
        //     "password.min"=>"password tối thiểu 3 ký tự",
        //     "password.max"=>"password tối đa 6 ký tự"
        // ];
        // $request->validate($rules,$messegs);
        // $users = DB::table('users')->where('email', $request->email)
        // ->where('password',$request->password)
        // ->get()->all();
        if(Auth::attempt(['email' => $loginRequest->email, 'password' => $loginRequest->password])){
            // $request->session()->put("email",$request->email);
            return redirect('/admin');
        }else{
            return redirect()->back()->withErrors('Tài khoản không hợp lệ!');
        }
    }
}
