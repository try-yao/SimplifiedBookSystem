<?php
/**
 * Created by PhpStorm.
 * User: Yoger
 * Date: 2019/8/6
 * Time: 23:08
 */

namespace App\Admin\Controllers;

use App\Jobs\SeedMessage;
use App\Notice;

class NoticeController extends Controller
{
    //首页
    public function index()
    {
        $notices = Notice::all();
        return view('admin/notice/index',compact('notices'));
    }

    //首页
    public function create()
    {
        return view('admin/notice/create');
    }

    //首页
    public function store()
    {
        $this->validate(request(),[
           'title' => 'required|string',
           'content' => 'required|string',
        ]);

       $notice =  Notice::create(request(['title','content']));
       dispatch(new SeedMessage($notice));
        return redirect('admin/notices');
    }

}