@extends('blog-new.layouts.master')
@section('content')
    <div class="content">
        @include('blog-new.layouts.carousel')
        @include('blog-new.layouts.word')
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
{{--        @include('blog-new.layouts.page')--}}
    </div>
@stop
