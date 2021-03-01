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
{{--   <link rel="stylesheet" type="text/css" href="{{asset('quietflow/css/index.css')}}"> --}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('quietflow/css/prism.css')}}">--}}
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
                        <span style="color: #2491F6">J</span>
                        <span style="color: #F63434">u</span>
                        <span style="color: #F69534">l</span>
                        <span style="color: #07A280">y</span>
                        <span style="color: #F63434">'</span>
                        <span style="color: #2491F6">s</span>
                        <span style="color: #F63434"> Blog</span>
                    </a>
                </h1>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-index active"><a data-cont="July's Blog" href="index.html"></a></li>
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
    <div id="top-grrk"></div>
</header>

<section class="container">
    <div class="content-wrap">
        @yield('content')
    </div>
    @include('blog-new.layouts.sidebar')
</section>
<footer class="footer">
    <div class="container">
        <p>&copy; {{date('Y')}} <a href="/">{{config('blog.domain')}}</a> &nbsp; <a href="#" target="_blank" rel="nofollow">苏ICP备17068687号</a>
            &nbsp; &nbsp; <a href="/" target="_blank">July's Blog</a>
            &nbsp; &nbsp;<a href="javascript:void(0)" id="chakhsu"></a>
            <script>
                var chakhsu = function (r) {function t() {return b[Math.floor(Math.random() * b.length)]} function e() {return String.fromCharCode(94 * Math.random() + 33)} function n(r) {for (var n = document.createDocumentFragment(), i = 0; r > i; i++) { var l = document.createElement("span"); l.textContent = e(), l.style.color = t(), n.appendChild(l) } return n}function i() {var t = o[c.skillI]; c.step ? c.step-- : (c.step = g, c.prefixP < l.length ? (c.prefixP >= 0 && (c.text += l[c.prefixP]), c.prefixP++) : "forward" === c.direction ? c.skillP < t.length ? (c.text += t[c.skillP], c.skillP++) : c.delay ? c.delay-- : (c.direction = "backward", c.delay = a) : c.skillP > 0 ? (c.text = c.text.slice(0, -1), c.skillP--) : (c.skillI = (c.skillI + 1) % o.length, c.direction = "forward")), r.textContent = c.text, r.appendChild(n(c.prefixP < l.length ? Math.min(s, s + c.prefixP) : Math.min(s, t.length - c.skillP))), setTimeout(i, d) } /*以下内容自定义修改*/ var l = "", o = ["此去经年,应是良辰美景虚设","便纵有千种风情,更与何人说" ].map(function (r) {return r + ""}), a = 2, g = 1, s = 5, d = 75, b = ["rgb(110,64,170)", "rgb(150,61,179)", "rgb(191,60,175)", "rgb(228,65,157)", "rgb(254,75,131)", "rgb(255,94,99)", "rgb(255,120,71)", "rgb(251,150,51)", "rgb(226,183,47)", "rgb(198,214,60)", "rgb(175,240,91)", "rgb(127,246,88)", "rgb(82,246,103)", "rgb(48,239,130)", "rgb(29,223,163)", "rgb(26,199,194)", "rgb(35,171,216)", "rgb(54,140,225)", "rgb(76,110,219)", "rgb(96,84,200)"], c = {text: "", prefixP: -s, skillI: 0, skillP: 0, direction: "forward", delay: a, step: g}; i() }; chakhsu(document.getElementById('chakhsu'));
            </script>
        </p>
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
{{--<script src="{{asset_blog('js/jquery.ias.js')}}"></script>--}}
<script src="{{asset_blog('js/scripts.js')}}"></script>
<script src="{{asset('js/anime.min.js')}}"></script>
<script src="{{asset('js/canvas.js')}}"></script>
{{--<script src="{{asset('quietflow/js/quietflow.min.js')}}"></script>--}}
<script type="text/javascript">
    /**
     * maxRadius 可以指定一个圆的最大随机半径。默认设置为40。
     * bounceSpeed 圆周运动的速度。默认设置为50
     * bounceBallCount 圈数。默认设置为50
     * transparent 布尔值使圆具有50％的不透明度。默认设置为true。
     */
    // $("body").quietflow({
    //     theme : "bouncingBalls",
    //     maxRadius:40,
    //     z_index : -1,
    //     specificColors : [
    //         'rgba(111, 163, 239)',
    //         'rgba(188, 153, 196)',
    //         'rgba(249, 187, 60)',
    //         'rgba(232, 88, 61)',
    //         'rgba(70, 196, 124)',
    //     ]
    // })
</script>
</body>
</html>
