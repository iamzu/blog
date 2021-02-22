<!doctype html>
<html lang="zh-CN">
<script>
    var _hmt = _hmt || [];
    (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?9f248526132e4001667800fed66baa31";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
    })();
</script>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('blog.title') }}</title>
    <link rel="stylesheet" type="text/css" href="{{asset_blog('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset_blog('css/nprogress.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset_blog('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset_blog('css/font-awesome.min.css')}}">
    {{--    <link rel="apple-touch-icon-precomposed" href="{{asset_blog('images/icon/icon.png')}}">--}}
    {{--    <link rel="shortcut icon" href="{{asset_blog('images/icon/favicon.ico')}}">--}}
    <script src="{{asset_blog('js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset_blog('js/nprogress.js')}}"></script>
    <script src="{{asset_blog('js/jquery.lazyload.min.js')}}"></script>
<!--[if gte IE 9]>
    <script src="{{asset_blog('js/jquery-1.11.1.min.js')}}" type="text/javascript"></script
    <script src="{{asset_blog('js/html5shiv.min.js')}}" type="text/javascript"></script>
    <script src="{{asset_blog('js/respond.min.js')}}" type="text/javascript"></script>
    <script src="{{asset_blog('js/selectivizr-min.js')}}" type="text/javascript"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script>window.location.href = 'upgrade-browser.html';</script>
    <![endif]-->
    @yield('styles')
    <style>
        :root {
            --hr-border: #2491F6;
            --hr-before-color: #2491F6;
            --tag-title-color: #2491F6;
            --post-meta: #9eabb3;
            --primary-color: #2491F6;
        }
        ul.fm-ul.fm-slide-in ul.fm-ul-component li.fm-li {
            box-sizing: content-box;
        }
    </style>
</head>


<body class="{{$bodyClass ?? 'user-select'}}">
<header class="header">
    <nav class="navbar navbar-default shadow" style="position: fixed;top:0" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#header-navbar" aria-expanded="false"><span class="sr-only"></span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                {{--                <h1 class="logo hvr-bounce-in"><a href="" title=""><img src="{{asset_blog('images/logo.png')}}" alt=""></a>--}}
                <h1 class="logo hvr-bounce-in">
                    <a href="/" title="Blog" style="line-height: 67px;display: inline-table;">
                        <span style="color: #2491F6">C</span>
                        <span style="color: #F63434">h</span>
                        <span style="color: #F69534">i</span>
                        <span style="color: #2491F6">a</span>
                        <span style="color: #07A280">2</span>
                        <span style="color: #F63434">'</span>
                        <span style="color: #2491F6">S</span>
                        <span style="color: #F63434"> Blog</span>
                    </a>
                </h1>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-index active"><a data-cont="异清轩首页" href="index.html"></a></li>
                    <li><a href="category.html"></a></li>
                    <li><a href="category.html"></a></li>
                    <li><a href="category.html"></a></li>
                    <li><a href="category.html"></a></li>
                    <li><a href="category.html"></a></li>
                </ul>
                <form class="navbar-form visible-xs" action="/Search" method="post">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20"
                               autocomplete="off">
                        <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span></div>
                </form>
            </div>
        </div>
    </nav>
</header>

<section class="container">
    <div class="content-wrap">
        @yield('content')
    </div>
    @include('blog-new.layouts.sidebar')
</section>
<footer class="footer">
    <div class="container">
        <p>&copy; {{date('Y')}} <a href="/">chia2.com</a> &nbsp; <a href="#" target="_blank" rel="nofollow">苏ICP备17068687号</a>
            &nbsp; &nbsp; <a href="/" target="_blank">Chia2's Blog</a></p>
    </div>
    <div id="gotop"><a class="gotop"></a></div>
</footer>
<!--微信二维码模态框-->
<div class="modal fade user-select" id="WeChat" tabindex="-1" role="dialog" aria-labelledby="WeChatModalLabel">
    <div class="modal-dialog" role="document" style="margin-top:120px;max-width:280px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="WeChatModalLabel" style="cursor:default;">微信扫一扫</h4>
            </div>
            <div class="modal-body" style="text-align:center"><img src="{{asset_blog('images/weixin.jpg')}}" alt=""
                                                                   style="cursor:pointer"/></div>
        </div>
    </div>
</div>
<!--该功能正在日以继夜的开发中-->
<div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog"
     aria-labelledby="areDevelopingModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
            </div>
            <div class="modal-body"><img src="{{asset_blog('images/baoman/baoman_01.gif')}}" alt="深思熟虑"/>
                <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">
                    很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
            </div>
        </div>
    </div>
</div>
<canvas id="mineCanvas"></canvas>
@yield('scripts')
<script src="{{asset_blog('js/bootstrap.min.js')}}"></script>
<script src="{{asset_blog('js/jquery.ias.js')}}"></script>
<script src="{{asset_blog('js/scripts.js')}}"></script>
<script src="{{asset('js/anime.min.js')}}"></script>
<script src="{{asset('js/canvas.js')}}"></script>
{{--<script src="{{asset('floatButton/js/float-module.min.js')}}"></script>--}}
<script type="text/javascript">
    // var fm = new FloatModule({
    //     animation:'slide-in',
    //     icon_css_path: null,
    //     btn_config: [{
    //         icon: 'fa fa-th-large',
    //         theme_color: '#2491F6',
    //     }, {
    //         icon: 'fa fa-envelope-o',
    //         title: '私信博主',
    //         theme_color: '#F63434',
    //         click: () => {
    //             location.href = 'http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=8pOWn5ucspGam5PA3JGdnw'
    //         }
    //     }, {
    //         icon: 'fa fa-qq',
    //         title: '联系博主',
    //         theme_color: '#2491F6',
    //         click: () => {
    //             location.href = 'http://wpa.qq.com/msgrd?V=1&uin=210849049'
    //         }
    //     }, {
    //         icon: 'fa fa-github',
    //         title: 'Github',
    //         theme_color: '#2491F6',
    //         click: () => {
    //             location.href = 'https://github.com/Chia2-y'
    //         }
    //     }]
    // });
</script>

</script>
</body>
</html>
