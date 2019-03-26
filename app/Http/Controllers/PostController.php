<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //文章列表页面
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        return view("post/index",compact('posts'));
    }

    //文章详情页面
    public function show(Post $post)
    {
        return view("post/show",compact('post'));
    }

    //文章创建页面
    public function create()
    {
        return view("post/create");
    }

    //文章保存逻辑
    public function store()
    {
        //验证
        $this->validate(request(),[
           'title' => 'required|string|max:100|min:5',
           'content' => 'required|string|min:10',
        ]);
        //逻辑
        $post = Post::create(request(['title','content']));

        //渲染
        return redirect('/posts');
    }

    //文章编辑页面
    public function edit()
    {
        return view("post/edit");
    }

    //文件更新逻辑
    public function update()
    {

    }

    //文章删除
    public function delete()
    {

    }
}
