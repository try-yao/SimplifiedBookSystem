<?php
/**
 * Created by PhpStorm.
 * User: Yoger
 * Date: 2019/8/6
 * Time: 23:08
 */

namespace App\Admin\Controllers;

use App\AdminRole;
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
    public function role(AdminUser $user)
    {
        $roles = AdminRole::all();
        $myRole = $user->roles;
        return view('/admin/user/role', compact('roles', 'myRole', 'user'));
    }

    //存储用户角色
    public function storeRole(AdminUser $user)
    {
        $this->validate(request(), [
            'roles' => 'required|array'
        ]);
        $roles = AdminRole::findMany(request('roles'));
        $myRoles = $user->roles;

        //要增加的
        $addRoles = $roles->diff($myRoles);
        foreach ($addRoles as $role) {
            $user->assignRole($role);
        }

        //要删除的
        $deleteRoles = $myRoles->diff($roles);
        foreach ($deleteRoles as $role) {
            $user->deleteRole($role);
        }

        return back();
    }
}