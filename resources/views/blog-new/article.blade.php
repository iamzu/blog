@extends('blog-new.layouts.master',[
    'title' => $post->title,
    'bodyClass' => 'user-select single',
    ])
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gitalk@1/dist/gitalk.css">
    <link href="{{ asset_blog('css/markdown.css') }}" rel="stylesheet">
    <link href="{{ asset('css/atom-one-dark.css') }}" rel="stylesheet">
    <link href="{{ asset_blog('css/article.css') }}" rel="stylesheet">
@stop
@section('content')
    <div class="content">
        <header class="article-header">
            <h1 class="article-title"><a href="javascript:void(0)">{{$post->title}}</a></h1>
            <div class="article-meta">
                <span class="item article-meta-time">
          <time class="time" data-toggle="tooltip" data-placement="bottom" title="时间：{{$post['ui_created_at']}}"><i
                  class="glyphicon glyphicon-time"></i>{{$post['ui_created_at']}}</time>
          </span>
                <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom"
                      title="分类：{{$post->tags[0]->tag}}">
                    <i class="glyphicon glyphicon-list"></i>
                    <a href="program" title="{{$post->tags[0]->subtitle}}">
                        {{$post->tags[0]->tag}}
                    </a>
                </span>
                <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="查看：120">
                    <i class="glyphicon glyphicon-eye-open"></i>
                    共120人围观
                </span>
            </div>
        </header>
        <article class="article-content markdown-body">
            {{--            <p><img data-original="{{$storage->url($post->page_image)}}"--}}
            {{--                    src="{{$storage->url($post->page_image)}}" alt=""/></p>--}}
            {!! $post->content_html !!}
            @if($post->tags[0]['id'] == 6)
                <p class="article-copyright hidden-xs" style="font-size: 15px">
                    本文中的知识点均来自
                    <a href="https://time.geekbang.org/column/intro/100039001" target="_blank">[极客时间 "设计模式之美"]</a>
                    是作者在学习过程中的笔记。
                </p>
            @elseif($post->tags[0]['id'] == 10)
                <p class="article-copyright hidden-xs" style="font-size: 15px">
                    本文中的知识点均来自
                    <a href="https://time.geekbang.org/column/126" target="_blank">[极客时间 "数据结构与算法之美"]</a>
                    是作者在学习过程中的笔记。
                </p>
            @else
                <p class="article-copyright hidden-xs" style="font-size: 15px">
                    本文为作者原创或转载，允许转载，由{{ $author ?? config('blog.author') }}在<a href="/"
                                                                               style="text-decoration:revert">{{ $title ?? config('blog.title') }}</a>
                    发布
                </p>
            @endif
        </article>
        <div class="article-tags">
            标签：
            @foreach($post->tags as $tag)
                <a href="" rel="tag">{{$tag->tag}}</a>
            @endforeach
        </div>
        <aside class="post-nav">
            @if(!empty($prevPost))
                <span class="post-nav-prev">
                <a href="{{ route('blog.detail',['id' => $prevPost->id]) }}">
                    <i class="fa fa-chevron-left"></i>
                     {{Str::limit($prevPost->title,30)}}
                </a>
            </span>
            @endif
            @if(!empty($nextPost))
                <span class="post-nav-next">
                <a href="{{ route('blog.detail',['id' => $nextPost->id]) }}">
                    {{Str::limit($nextPost->title,30)}}
                    <i class="fa fa-chevron-right"></i>
                </a>
            </span>
            @endif
        </aside>
        <figure class="author-info">
            <section class="author-info-title">
                <span class="pull-right">发表于：<time class="post-date"
                                                   datetime="{{$post['ui_created_at']}}">{{$post['ui_created_at']}}</time></span>
                <span>作者：七月</span>
            </section>
            <section class="author-info-content">
                <span class="author-info-bio">关注互联网以及分享全栈工作经验的原创个人博客和技术博客，热爱编程，极客精神</span>
                <section class="author-info-social">
                    <a href="https://github.com/July-zy" class="author-info-social-github" target="_blank">Github</a>
                    {{--                    <a href="https://weibo.com/wuyanzu?topnav=1&amp;wvr=6&amp;topsug=1&amp;is_hot=1" class="author-info-social-weibo" target="_blank">新浪微博</a>--}}
                    <a href="https://segmentfault.com/u/lsoex" class="author-info-social-sf" target="_blank">SegmentFault</a>
                    <a href="https://juejin.cn/user/36500343349620938" class="author-info-social-jj" target="_blank">掘金专栏</a>
                </section>
            </section>
        </figure>
        {{--        <hr>--}}
        {{--        <div id="post-comment">--}}
        {{--            <div class="comment-head">--}}
        {{--                <div class="comment-headline"><i class="fa fa-comments fa-fw"></i><span> 评论</span></div>--}}
        {{--            </div>--}}
        {{--            <div id="gitalk-container"></div>--}}
        {{--        </div>--}}
        {{--       评论--}}
        {{--        <div class="title" id="comment">--}}
        {{--            <h3>评论 <small>抢沙发</small></h3>--}}
        {{--        </div>--}}
        {{--        <div id="respond">--}}
        {{--            <form action="" method="post" id="comment-form">--}}
        {{--                <div class="comment">--}}
        {{--                    <div class="comment-title"><img class="avatar" src="{{asset_blog('images/icon/icon.png')}}"--}}
        {{--                                                    alt=""/></div>--}}
        {{--                    <div class="comment-box">--}}
        {{--                        <textarea placeholder="您的评论可以一针见血" name="comment" id="comment-textarea" cols="100%" rows="3"--}}
        {{--                                  tabindex="1"></textarea>--}}
        {{--                        <div class="comment-ctrl">--}}
        {{--                            <div class="comment-prompt"><i class="fa fa-spin fa-circle-o-notch"></i> <span--}}
        {{--                                        class="comment-prompt-text"></span></div>--}}
        {{--                            <input type="hidden" value="1" class="articleid"/>--}}
        {{--                            <button type="submit" name="comment-submit" id="comment-submit" tabindex="5" articleid="1">--}}
        {{--                                评论--}}
        {{--                            </button>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </form>--}}
        {{--        </div>--}}
        {{--        <div id="postcomments">--}}
        {{--            <ol class="commentlist">--}}
        {{--                <li class="comment-content"><span class="comment-f">#1</span>--}}
        {{--                    <div class="comment-avatar"><img class="avatar"--}}
        {{--                                                     src="{{asset_blog('images/icon/icon.png')}}" alt=""/>--}}
        {{--                    </div>--}}
        {{--                    <div class="comment-main">--}}
        {{--                        <p>来自<span class="address">河南郑州</span>的用户<span class="time">(2016-01-06)</span><br/>--}}
        {{--                            这是匿名评论的内容这是匿名评论的内容，这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容。</p>--}}
        {{--                    </div>--}}
        {{--                </li>--}}
        {{--            </ol>--}}
        {{--        </div>--}}
    </div>
@stop
@section('scripts')

    {{--    <script src="https://cdn.jsdelivr.net/npm/gitalk@1/dist/gitalk.min.js"></script>--}}
    <script src="{{ asset('js/highlight.pack.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            // map();
        });
        hljs.initHighlightingOnLoad();

        function map() {
            let postContent = document.querySelector('.article-content');

            if (postContent) {
                let categories = postContent.querySelectorAll('h1,h2,h3,h4,h5,h6');
                console.log(categories);

                if (categories.length > 0) { // 文章存在标题
                    let map = document.querySelector('.map'),
                        li = document.createElement('li'),
                        a = document.createElement('a');

                    categories.forEach((node,index) => {
                        // 每次 cloneNode 取代 createElement
                        // 因为克隆一个元素快于创建一个元素
                        let _li = li.cloneNode(false),
                            _a = a.cloneNode(false);

                        _a.innerText = node.innerText;
                        // 为标题设置跳转链接
                        _a.href = '#toc-' + index;
                        _li.appendChild(_a);
                        // 为不同级别标题应用不同的缩进
                        _li.style.paddingLeft = node.nodeName.slice(-1) * 15 + 'px';
                        map.appendChild(_li);
                    })
                }

            }
        }
    </script>
    {{--    <script>--}}
    {{--        var gitalk = new Gitalk({--}}
    {{--            clientID: '{{env('GITHUB_GITALK_CLIENTID','88debbb87ea8d82e7bd0')}}',--}}
    {{--            clientSecret: '{{env('GITHUB_GITALK_CLIENTSECRET','1989bc865afd40e9d8043c1a71a0afbdfd1bedf6')}}',--}}
    {{--            repo: 'blog-gitalk',--}}
    {{--            owner: 'Chia2-y',--}}
    {{--            admin: ['Chia2-y'],--}}
    {{--            id: location.pathname,      // Ensure uniqueness and length less than 50--}}
    {{--            distractionFreeMode: false  // Facebook-like distraction free mode--}}
    {{--        })--}}
    {{--        gitalk.render('gitalk-container')--}}
    {{--    </script>--}}
@stop
