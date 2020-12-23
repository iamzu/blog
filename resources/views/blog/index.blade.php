<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>博客</title>
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
    <script>window.location.href='upgrade-browser.html';</script>
    <![endif]-->
</head>

<body class="user-select">
<header class="header">
    <nav class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <h1 class="logo hvr-bounce-in"><a href="" title=""><img src="{{asset_blog('images/logo.png')}}" alt=""></a></h1>
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
                        <input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
                        <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
                </form>
            </div>
        </div>
    </nav>
</header>
<section class="container">
    <div class="content-wrap">
        <div class="content">
            <div class="jumbotron">
                <h1>欢迎访问异清轩博客</h1>
                <p>在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</p>
            </div>
            <div id="focusslide" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#focusslide" data-slide-to="0" class="active"></li>
                    <li data-target="#focusslide" data-slide-to="1"></li>
                    <li data-target="#focusslide" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active"> <a href="" target="_blank"><img src="{{asset_blog('images/banner/01.jpg')}}" alt="" class="img-responsive"></a>
                        <!--<div class="carousel-caption"> </div>-->
                    </div>
                    <div class="item"> <a href="" target="_blank"><img src="{{asset_blog('images/banner/02.jpg')}}" alt="" class="img-responsive"></a>
                        <!--<div class="carousel-caption"> </div>-->
                    </div>
                    <div class="item"> <a href="" target="_blank"><img src="{{asset_blog('images/banner/03.jpg')}}" alt="" class="img-responsive"></a>
                        <!--<div class="carousel-caption"> </div>-->
                    </div>
                </div>
                <a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">上一个</span> </a> <a class="right carousel-control" href="#focusslide" role="button" data-slide="next" rel="nofollow"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">下一个</span> </a> </div>
            <article class="excerpt-minic excerpt-minic-index">
                <h5><span class="red">【今日推荐】</span><a href="" title="">从下载看我们该如何做事</a></h5>
            </article>

            <article class="excerpt excerpt-1"><a class="focus" href="article.html" title=""><img class="thumb" data-original="{{asset_blog('images/excerpt.jpg')}}" src="{{asset_blog('images/excerpt.jpg')}}" alt=""></a>
                <header>
                    <h2><a href="article.html" title="">php如何判断一个日期的格式是否正确</a></h2>
                </header>
                <p class="note">可以用strtotime()把日期（$date）转成时间戳，再用date()按需要验证的格式转成一个日期，来跟$date比较是否相同来验证这个日期的格式是否是正确的。所以要验证日期格式 ... </p>
                <p class="meta">
                    <time class="time"><i class="glyphicon glyphicon-time"></i> 2016-1-4 10:29:39</time>
                    <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共120人围观</span> <a class="comment" href="article.html#comment"><i class="glyphicon glyphicon-comment"></i> 0个不明物体</a></p>
            </article>
            <article class="excerpt excerpt-1"><a class="focus" href="article.html" title=""><img class="thumb" data-original="{{asset_blog('images/excerpt.jpg')}}" src="{{asset_blog('images/excerpt.jpg')}}" alt=""></a>
                <header>
                    <h2><a href="article.html" title="">php如何判断一个日期的格式是否正确</a></h2>
                </header>
                <p class="note">可以用strtotime()把日期（$date）转成时间戳，再用date()按需要验证的格式转成一个日期，来跟$date比较是否相同来验证这个日期的格式是否是正确的。所以要验证日期格式 ... </p>
                <p class="meta">
                    <time class="time"><i class="glyphicon glyphicon-time"></i> 2016-1-4 10:29:39</time>
                    <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共120人围观</span> <a class="comment" href="article.html#comment"><i class="glyphicon glyphicon-comment"></i> 0个不明物体</a></p>
            </article>
            <article class="excerpt excerpt-1"><a class="focus" href="article.html" title=""><img class="thumb" data-original="{{asset_blog('images/excerpt.jpg')}}" src="{{asset_blog('images/excerpt.jpg')}}" alt=""></a>
                <header>
                    <h2><a href="article.html" title="">php如何判断一个日期的格式是否正确</a></h2>
                </header>
                <p class="note">可以用strtotime()把日期（$date）转成时间戳，再用date()按需要验证的格式转成一个日期，来跟$date比较是否相同来验证这个日期的格式是否是正确的。所以要验证日期格式 ... </p>
                <p class="meta">
                    <time class="time"><i class="glyphicon glyphicon-time"></i> 2016-1-4 10:29:39</time>
                    <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共120人围观</span> <a class="comment" href="article.html#comment"><i class="glyphicon glyphicon-comment"></i> 0个不明物体</a></p>
            </article>
            <article class="excerpt excerpt-1"><a class="focus" href="article.html" title=""><img class="thumb" data-original="{{asset_blog('images/excerpt.jpg')}}" src="{{asset_blog('images/excerpt.jpg')}}" alt=""></a>
                <header>
                    <h2><a href="article.html" title="">php如何判断一个日期的格式是否正确</a></h2>
                </header>
                <p class="note">可以用strtotime()把日期（$date）转成时间戳，再用date()按需要验证的格式转成一个日期，来跟$date比较是否相同来验证这个日期的格式是否是正确的。所以要验证日期格式 ... </p>
                <p class="meta">
                    <time class="time"><i class="glyphicon glyphicon-time"></i> 2016-1-4 10:29:39</time>
                    <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共120人围观</span> <a class="comment" href="article.html#comment"><i class="glyphicon glyphicon-comment"></i> 0个不明物体</a></p>
            </article>
            <article class="excerpt excerpt-1"><a class="focus" href="article.html" title=""><img class="thumb" data-original="{{asset_blog('images/excerpt.jpg')}}" src="{{asset_blog('images/excerpt.jpg')}}" alt=""></a>
                <header>
                    <h2><a href="article.html" title="">php如何判断一个日期的格式是否正确</a></h2>
                </header>
                <p class="note">可以用strtotime()把日期（$date）转成时间戳，再用date()按需要验证的格式转成一个日期，来跟$date比较是否相同来验证这个日期的格式是否是正确的。所以要验证日期格式 ... </p>
                <p class="meta">
                    <time class="time"><i class="glyphicon glyphicon-time"></i> 2016-1-4 10:29:39</time>
                    <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共120人围观</span> <a class="comment" href="article.html#comment"><i class="glyphicon glyphicon-comment"></i> 0个不明物体</a></p>
            </article>
            <article class="excerpt excerpt-1"><a class="focus" href="article.html" title=""><img class="thumb" data-original="{{asset_blog('images/excerpt.jpg')}}" src="{{asset_blog('images/excerpt.jpg')}}" alt=""></a>
                <header>
                    <h2><a href="article.html" title="">php如何判断一个日期的格式是否正确</a></h2>
                </header>
                <p class="note">可以用strtotime()把日期（$date）转成时间戳，再用date()按需要验证的格式转成一个日期，来跟$date比较是否相同来验证这个日期的格式是否是正确的。所以要验证日期格式 ... </p>
                <p class="meta">
                    <time class="time"><i class="glyphicon glyphicon-time"></i> 2016-1-4 10:29:39</time>
                    <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共120人围观</span> <a class="comment" href="article.html#comment"><i class="glyphicon glyphicon-comment"></i> 0个不明物体</a></p>
            </article>
            <nav class="pagination" style="display: none;">
                <ul>
                    <li class="prev-page"></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="?page=2">2</a></li>
                    <li class="next-page"><a href="?page=2">下一页</a></li>
                    <li><span>共 2 页</span></li>
                </ul>
            </nav>
        </div>
    </div>
    <aside class="sidebar">
        <div class="fixed">
            <div class="widget widget-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">网站公告</a></li>
                    <li role="presentation"><a href="#centre" aria-controls="centre" role="tab" data-toggle="tab">会员中心</a></li>
                    <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">联系站长</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane notice active" id="notice">
                        <ul>
                            <li>
                                <time datetime="2016-01-04">01-04</time>
                                <a href="" target="_blank">欢迎访问异清轩博客</a></li>
                            <li>
                                <time datetime="2016-01-04">01-04</time>
                                <a target="_blank" href="">在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</a></li>
                            <li>
                                <time datetime="2016-01-04">01-04</time>
                                <a target="_blank" href="">在这个小工具中最多可以调用五条</a></li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane centre" id="centre">
                        <h4>需要登录才能进入会员中心</h4>
                        <p> <a data-toggle="modal" data-target="#loginModal" class="btn btn-primary">立即登录</a> <a href="javascript:;" class="btn btn-default">现在注册</a> </p>
                    </div>
                    <div role="tabpanel" class="tab-pane contact" id="contact">
                        <h2>Email:<br />
                            <a href="mailto:admin@ylsat.com" data-toggle="tooltip" data-placement="bottom" title="admin@ylsat.com">admin@ylsat.com</a></h2>
                    </div>
                </div>
            </div>
            <div class="widget widget_search">
                <form class="navbar-form" action="/Search" method="post">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
                        <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
                </form>
            </div>
        </div>
        <div class="widget widget_sentence">
            <h3>每日一句</h3>
            <div class="widget-sentence-content">
                <h4>2016年01月05日星期二</h4>
                <p>Do not let what you cannot do interfere with what you can do.<br />
                    别让你不能做的事妨碍到你能做的事。（John Wooden）</p>
            </div>
        </div>
        <div class="widget widget_hot">
            <h3>热门文章</h3>
            <ul>
                <li><a href=""><span class="thumbnail"><img class="thumb" data-original="{{asset_blog('images/excerpt.jpg')}}" src="{{asset_blog('images/excerpt.jpg')}}" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a></li>
                <li><a href=""><span class="thumbnail"><img class="thumb" data-original="{{asset_blog('images/excerpt.jpg')}}" src="{{asset_blog('images/excerpt.jpg')}}" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a></li>
                <li><a href=""><span class="thumbnail"><img class="thumb" data-original="{{asset_blog('images/excerpt.jpg')}}" src="{{asset_blog('images/excerpt.jpg')}}" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a></li>
                <li><a href=""><span class="thumbnail"><img class="thumb" data-original="{{asset_blog('images/excerpt.jpg')}}" src="{{asset_blog('images/excerpt.jpg')}}" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a></li>
                <li><a href=""><span class="thumbnail"><img class="thumb" data-original="{{asset_blog('images/excerpt.jpg')}}" src="{{asset_blog('images/excerpt.jpg')}}" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a></li>
            </ul>
        </div>
    </aside>
</section>
<footer class="footer">
    <div class="container">
        <p>&copy; {{date('Y')}} <a href="/">chia2.com</a> &nbsp; <a href="#" target="_blank" rel="nofollow">苏ICP备17068687号</a> &nbsp; &nbsp; <a href="/" target="_blank">Chia2's Blog</a></p>
    </div>
    <div id="gotop"><a class="gotop"></a></div>
</footer>
<!--微信二维码模态框-->
<div class="modal fade user-select" id="WeChat" tabindex="-1" role="dialog" aria-labelledby="WeChatModalLabel">
    <div class="modal-dialog" role="document" style="margin-top:120px;max-width:280px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="WeChatModalLabel" style="cursor:default;">微信扫一扫</h4>
            </div>
            <div class="modal-body" style="text-align:center"> <img src="{{asset_blog('images/weixin.jpg')}}" alt="" style="cursor:pointer"/> </div>
        </div>
    </div>
</div>
<!--该功能正在日以继夜的开发中-->
<div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog" aria-labelledby="areDevelopingModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
            </div>
            <div class="modal-body"> <img src="{{asset_blog('images/baoman/baoman_01.gif')}}" alt="深思熟虑" />
                <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
            </div>
        </div>
    </div>
</div>
<!--右键菜单列表-->
{{--<div id="rightClickMenu">--}}
{{--    <ul class="list-group rightClickMenuList">--}}
{{--        <li class="list-group-item disabled">欢迎访问异清轩博客</li>--}}
{{--        <li class="list-group-item"><span>IP：</span>172.16.10.129</li>--}}
{{--        <li class="list-group-item"><span>地址：</span>河南省郑州市</li>--}}
{{--        <li class="list-group-item"><span>系统：</span>Windows10 </li>--}}
{{--        <li class="list-group-item"><span>浏览器：</span>Chrome47</li>--}}
{{--    </ul>--}}
{{--</div>--}}
<script src="{{asset_blog('js/bootstrap.min.js')}}"></script>
<script src="{{asset_blog('js/jquery.ias.js')}}"></script>
<script src="{{asset_blog('js/scripts.js')}}"></script>
</body>
</html>
