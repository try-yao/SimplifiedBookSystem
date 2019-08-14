<?php
/**
 * Created by PhpStorm.
 * User: Yoger
 * Date: 2019/8/8
 * Time: 22:59
 */
namespace App\Admin\Controllers;
class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }

}