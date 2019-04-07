<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        return view('login.index');
    }

    //登录行为
    public function login(Request $request)
    {
        //验证
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:30',
            'is_remember' => '',
        ]);

        //逻辑
        $user = request(['email', 'password']);
        $remember = boolval(request('is_remember'));
        if (true == Auth::attempt($user, $remember)) {
            return redirect('/posts');
        }

        //渲染
        return Redirect::back()->withErrors("用户名密码错误");
    }

    //登出行为
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
