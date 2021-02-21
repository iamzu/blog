@extends('blog-new.layouts.master',[
    'title' => $tag['tag'].' | '. ($title ?? config('blog.title')),
    'bodyClass' => 'user-select',
    ])
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gitalk@1/dist/gitalk.css">
    <link href="{{ asset_blog('css/markdown.css') }}" rel="stylesheet">
    <link href="{{ asset('css/atom-one-dark.css') }}" rel="stylesheet">
@stop
@section('content')
    <style>
        .article-header {
            background: var(--tag-title-color);
        }

        .tag-title {
            margin: .8rem;
            color: #fff;
            font-size: 3.2rem;
            letter-spacing: -1px;
            font-weight: 700;
        }

        .tag-subtitle {
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
            font-size: 2rem;
            line-height: 1.5em;
            font-weight: 400;
            letter-spacing: 0.01rem;
        }
    </style>
    <div class="content">
        <header class="article-header tag-{{$tag['id']}}" id="">
            <label class="tag-title">标签：{{$tag['tag']}}</label>
            @if($tag['showNum'])
                <span class="tag-subtitle">
                    共计 {{$tag['count']}} 篇文章
                </span>
            @else
                <span class="tag-subtitle">
                    {{$tag['subtitle']}}
                </span>
            @endif

        </header>
        @foreach($articleList as $item)
            <article class="excerpt excerpt-1">
                <a class="focus" href="{{ route('blog.detail',['id' => $item['id']]) }}" title="">
                    <img class="thumb"
                         data-original="{{$storage->url($item['page_image'])}}"
                         src="{{$storage->url($item['page_image'])}}"
                         alt="">
                </a>
                <header>
                    <h2><a href="{{ route('blog.detail',['id' => $item['id']]) }}"
                           title="">{{ $item['title'] }}</a></h2>
                </header>
                <p class="note"> {{ $item['subtitle'] }}</p>
                <p class="meta">
                    <time class="time"><i class="glyphicon glyphicon-time"></i>{{ $item['ui_created_at'] }}
                    </time>
                    <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共0人围观</span> <a
                        class="comment"
                        href="{{ route('blog.detail',['id' => $item['id']]) }}"><i
                            class="glyphicon glyphicon-comment"></i> 0个不明物体</a></p>
            </article>
        @endforeach
    </div>
@stop
