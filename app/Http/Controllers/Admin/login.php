<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;


class login extends Controller
{
    use AuthenticatesUsers;

   public function index(Request $request)
   {
      return view('Admin.login.index');
   }

    public function login(Request $request){
        $name = $request->post('username');
        $password = $request->post('password');
        $vercode = $request->post('vercode');
        $remember = $request->post('remember');//记住密码

        $this->validate($request, [
            'vercode' => 'required|captcha'
        ],[
            'vercode.required' => '验证码不能为空',
            'vercode.captcha' => '请输入正确的验证码',
        ]);
        if (Auth::guard('admin')->attempt(['email' => $name, 'password' => $password])){
            return response()->json(['code' => 200, 'msg' => '登录成功','data'=>['url'=>'admin/index']]);
        }
        api_json('','登录失败',500);
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
