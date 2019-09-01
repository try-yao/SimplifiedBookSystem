<?php
/**
 * Created by PhpStorm.
 * User: Yoger
 * Date: 2019/8/6
 * Time: 23:08
 */

namespace App\Admin\Controllers;

use App\Post;
use App\Topic;

class TopicController extends Controller
{
    //首页
    public function index()
    {
        $topics = Topic::all();
        return view('admin/topic/index',compact('topics'));
    }

    //首页
    public function create()
    {
        return view('admin/topic/create');
    }

    //首页
    public function store()
    {
        $this->validate(request(),[
           'name' => 'required|string'
        ]);

        Topic::create(['name'=>request('name')]);
        return redirect('admin/topics');
    }

    //首页
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return [
          'error' => 0,
            'msg' => ''
        ];
    }

}