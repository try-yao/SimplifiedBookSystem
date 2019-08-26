<?php
/**
 * Created by PhpStorm.
 * User: Yoger
 * Date: 2019/8/6
 * Time: 23:08
 */

namespace App\Admin\Controllers;

use App\AdminUser;

class UserController extends Controller
{
    //管理员列表页面
    public function index()
    {
        $users = AdminUser::paginate(10);
        return view('/admin/user/index', compact('users'));
    }

    //管理员添加页面
    public function create()
    {
        return view('/admin/user/add');
    }

    //保存
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'password' => 'required|min:6',
        ]);

        $name = request('name');
        $password = bcrypt(request('password'));

        AdminUser::create(compact('name', 'password'));
        return redirect('admin/users');
    }

    //用户角色页面
    public function role()
    {
        return view('/admin/user/role');
    }

    //存储用户角色
    public function storeRole()
    {

    }
}