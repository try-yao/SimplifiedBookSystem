<?php
/**
 * Created by PhpStorm.
 * User: Yoger
 * Date: 2019/8/8
 * Time: 22:59
 */

namespace App\Admin\Controllers;
use App\AdminPermission;

class PermissionController extends Controller
{
    //权限列表页面
    public function index()
    {
        $permissions = AdminPermission::paginate(10);
        return view('admin/permission/index',compact('permissions'));
    }

    //创建权限页面
    public function create()
    {
        return view('admin/permission/add');
    }

    //创建权限
    public function store()
    {
        $this->validate(request(),[
           'name' => 'required|min:3',
            'description' => 'required'
        ]);
        AdminPermission::create(request(['name','description']));

        return redirect('admin/permissions');
    }

}