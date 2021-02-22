<style>
    .pagination {
        position: relative;
        width: 100%;
        margin: 0 auto 2em;
        font-size: 1.3rem;
        color: var(--post-meta);
        text-align: center;
        display: inline-block;
        padding-left: 0;
        border-radius: 4px;
        background: #FFF;
        line-height: 2.0em;
    }

    .pagination a {
        color: var(--post-meta);
        transition: all 0.2s ease;
        text-decoration: none !important;
    }

    .older-posts {
        right: 20px;
    }

    .newer-posts {
        left: 20px;
    }

    .newer-posts, .older-posts {
        position: absolute;
        display: inline-block;
        padding: 0 15px;
        border: #bfc8cd 1px solid;
        text-decoration: none;
        border-radius: 4px;
        transition: border 0.3s ease;
    }

    .older-posts:hover, .newer-posts:hover {
        color: #fff;
        border-color: var(--primary-color);
        background-color: var(--primary-color);
    }
</style>
<nav class="pagination" role="navigation">
    @if($articleList->currentPage() != 1)
        <a rel="prev" class="newer-posts"
           href="{{ $prePage  }}"><i
                class="fa fa-chevron-left"></i>&nbsp;上一页</a>
    @endif
    <span class="page-number">Page {{$articleList->currentPage() }} of {{$articleList->lastpage()}}</span>
    @if($articleList->hasMorePages())
        <a rel="next" class="older-posts" href="{{ $nextPage }}">下一页&nbsp;<i
            class="fa fa-chevron-right"></i></a>
    @endif
</nav>
