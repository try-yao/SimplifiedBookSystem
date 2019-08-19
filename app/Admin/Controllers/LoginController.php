<?php
/**
 * Created by PhpStorm.
 * User: Yoger
 * Date: 2019/8/8
 * Time: 22:59
 */
namespace App\Admin\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        //验证
        $this->validate($request, [
            'name' => 'required|min:2',
            'password' => 'required|min:6|max:30',
        ]);

        //逻辑
        $user = request(['name', 'password']);
        if (true == Auth::guard('admin')->attempt($user)) {
            return redirect('/admin/home');
        }

        //渲染
        return Redirect::back()->withErrors("用户名密码错误");

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

}