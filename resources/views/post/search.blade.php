@extends("layout.main")
@section("content")
        <div class="alert alert-success" role="alert">
            下面是搜索"{{$query}}"出现的文章，共{{$posts->total()}}条
        </div>

        <div class="col-sm-8 blog-main">
            @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} <a href="/user/{{$post->id}}">
                        {{$post->user->name}}
                    </a></p>

                {{--//第三个参数默认省略的就是... 也可以自定义其他的--}}
                <p>{!! str_limit($post->content,100,'...') !!}
                <p class="blog-post-meta">赞 {{$post->zans_count}} | 评论 {{$post->comments_count}}</p>

            </div>
            @endforeach
                {{$posts->appends(['query' => $query])->links()}}
        </div><!-- /.blog-main -->



@endsection