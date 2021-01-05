@extends('blog-new.layouts.master',[
    'title' => $post->title,
    'bodyClass' => 'user-select single',
    ])
@section('content')
    <div class="content">
        <header class="article-header">
            <h1 class="article-title"><a href="article.html">php如何判断一个日期的格式是否正确</a></h1>
            <div class="article-meta">
                <span class="item article-meta-time">
          <time class="time" data-toggle="tooltip" data-placement="bottom" title="时间：2016-1-4 10:29:39"><i
                      class="glyphicon glyphicon-time"></i> 2016-1-4 10:29:39</time>
          </span>
                <span
                        class="item article-meta-category" data-toggle="tooltip" data-placement="bottom"
                        title="栏目：后端程序"><i class="glyphicon glyphicon-list"></i> <a href="program"
                                                                                    title="">{{$post->tags[0]->tag}}</a></span>
                <span
                        class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="查看：120"><i
                            class="glyphicon glyphicon-eye-open"></i> 共120人围观</span>
        </header>
        <article class="article-content">
            <p><img data-original="{{$storage->url($post->page_image)}}"
                    src="{{$storage->url($post->page_image)}}" alt=""/></p>
            {!! $post->content_html !!}
            <p class="article-copyright hidden-xs">未经允许不得转载：<a href="/">{{ $title ?? config('blog.title') }}</a> » <a
                        href="{{ route('blog.detail',['slug' => $post->slug]) }}">{{$post->title}}</a>
            </p>
        </article>
        <div class="article-tags">标签：<a href="" rel="tag">{{$post->tags[0]->tag}}</a></div>

        <div class="title" id="comment">
            <h3>评论 <small>抢沙发</small></h3>
        </div>
        <div id="respond">
            <form action="" method="post" id="comment-form">
                <div class="comment">
                    <div class="comment-title"><img class="avatar" src="{{asset_blog('images/icon/icon.png')}}"
                                                    alt=""/></div>
                    <div class="comment-box">
                        <textarea placeholder="您的评论可以一针见血" name="comment" id="comment-textarea" cols="100%" rows="3"
                                  tabindex="1"></textarea>
                        <div class="comment-ctrl">
                            <div class="comment-prompt"><i class="fa fa-spin fa-circle-o-notch"></i> <span
                                        class="comment-prompt-text"></span></div>
                            <input type="hidden" value="1" class="articleid"/>
                            <button type="submit" name="comment-submit" id="comment-submit" tabindex="5" articleid="1">
                                评论
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="postcomments">
            <ol class="commentlist">
                <li class="comment-content"><span class="comment-f">#1</span>
                    <div class="comment-avatar"><img class="avatar"
                                                     src="{{asset_blog('images/icon/icon.png')}}" alt=""/>
                    </div>
                    <div class="comment-main">
                        <p>来自<span class="address">河南郑州</span>的用户<span class="time">(2016-01-06)</span><br/>
                            这是匿名评论的内容这是匿名评论的内容，这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容。</p>
                    </div>
                </li>
            </ol>
        </div>
    </div>
@stop