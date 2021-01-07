<aside class="sidebar">
    <div class="fixed">
        <div class="widget widget_search">
            <form class="navbar-form" action="/Search" method="post">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字"
                           maxlength="15" autocomplete="off">
                    <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span></div>
            </form>
        </div>
    </div>
    <div class="widget widget_hot">
        <h3>热门文章</h3>
        <ul>
            @foreach($sidebarArticleList as $item)
            <li>
                <a href="{{ route('blog.detail',['slug' => $item['slug']]) }}">
                    <span class="thumbnail">
                        <img class="thumb"
                             data-original="{{$storage->url($item['page_image'])}}"
                             src="{{$storage->url($item['page_image'])}}"
                             alt="">
                    </span>
                    <span class="text">{{$item['title']}}</span>
                    <span class="muted">
                        <i class="glyphicon glyphicon-time"></i> {{ $item['published_at'] }}
                    </span><span class="muted">
                        <i class="glyphicon glyphicon-eye-open"></i> 0
                    </span>
                </a>
            </li>
            @endforeach

        </ul>
    </div>
</aside>
