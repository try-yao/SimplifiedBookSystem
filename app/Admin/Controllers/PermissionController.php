<?php
/**
 * Created by PhpStorm.
 * User: Yoger
 * Date: 2019/8/8
 * Time: 22:59
 */

namespace App\Admin\Controllers;
class PermissionController extends Controller
{
    //权限列表页面
    public function index()
    {
        return view('admin/permission/index');
    }

    //创建权限页面
    public function create()
    {
        return view('admin/permission/add');
    }

    //创建权限
    public function store()
    {

    }

}