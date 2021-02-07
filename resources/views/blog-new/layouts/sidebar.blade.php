<link rel="stylesheet" href="{{asset_blog('calendar/css/style.css')}}">
<link rel="stylesheet" href="{{asset('flipclock/css/flipclock.css')}}">
@php($isPost = strpos(request()->path(),'post') !== false)
<style>
    .calendar {
        /*border-bottom:unset!important;*/
        background-color: unset !important;
        text-align: center;
        font-family: cursive;
        font-weight: 900;
        width: 85%;
        margin: 0 auto !important;
    }

    #schedule-box {
        padding: 5px;
    }

    .boxshaw {
        box-shadow: unset;
    }

    .today {
        color: #3399CC
    }

    /*今天*/
    .today-flag {
        background: #3399CC;
        color: #fff;
    }

    .current-month > .dayStyle:hover {
        background: #00C2B1;
    }

    /*选中*/
    .selected-style {
        background-color: #EF3737;
    }

    /*时钟*/
    .flip-clock-wrapper /deep/ a {
        padding: unset !important;
        border-bottom: unset !important;
    }

    .flip-clock-wrapper ul {
        width: 40px !important;
    }

    .navigation li a {
        padding: 10px;
        border-bottom: unset;
    }

    .navigation li a:hover {
        color: #2491f6;
        -webkit-transform: unset;
        transform: unset;
        -webkit-transition-timing-function: unset;
        transition-timing-function: unset;
    }

    .navigation /deep/ .h1, .h2, .h3 {
        margin: unset !important;
    }

    .navigation > ul {
        list-style: unset !important;
    }

    .friend {
        padding: 2px 6px;
        background-color: rgba(36, 145, 246, .08);
        margin: 0 5px 5px 0;
        display: inline-block;
    }

    .friend:hover {
        background-color: rgba(36, 145, 246);
        color: #fff;
    }

</style>
<aside class="sidebar">
    <div class="fixed">
        <div class="widget widget_search">
            <form class="navbar-form" action="/" method="GET">
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
        <div class="clock"></div>
    </div>
    <div class="widget widget_hot" style="display: {{$isPost?'none':'block'}}">
        <div style="width: 100%">
            <h3 class="calendar">时间不是流逝的，流逝的是我们</h3>
        </div>
        <div id='schedule-box' class="boxshaw"></div>
    </div>

    {{--    @if(($articleMap ?? null) && $isPost)--}}
    {{--        <div class="fixed">--}}
    {{--            <div class="widget widget_hot navigation">--}}
    {{--                <h3>目录</h3>--}}
    {{--                <ul>--}}
    {{--                    {!! $articleMap !!}--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    @endif--}}
    {{--    <div class="widget widget_hot">--}}
    {{--        <h3>热门文章</h3>--}}
    {{--        <ul>--}}
    {{--            @foreach($sidebarArticleList as $item)--}}
    {{--                <li>--}}
    {{--                    <a href="{{ route('blog.detail',['id' => $item['id']]) }}">--}}
    {{--                    <span class="thumbnail">--}}
    {{--                        <img class="thumb"--}}
    {{--                             data-original="{{$storage->url($item['page_image'])}}"--}}
    {{--                             src="{{$storage->url($item['page_image'])}}"--}}
    {{--                             alt="">--}}
    {{--                    </span>--}}
    {{--                        <span class="text">{{$item['title']}}</span>--}}
    {{--                        <span class="muted">--}}
    {{--                        <i class="glyphicon glyphicon-time"></i> {{ $item['published_at'] }}--}}
    {{--                    </span><span class="muted">--}}
    {{--                        <i class="glyphicon glyphicon-eye-open"></i> 0--}}
    {{--                    </span>--}}
    {{--                    </a>--}}
    {{--                </li>--}}
    {{--            @endforeach--}}

    {{--        </ul>--}}
    {{--    </div>--}}
    <div class="widget widget_hot">
        <h3><i class="fa fa-tags" style="margin-right: 10px;"></i>标签</h3>
        <div style="padding: 10px">
            @foreach($sidebarTags as $item)
                <a class="friend tags tag-{{$item['id']}}" id="{{$item['id']}}" href="">#{{$item['tag']}}</a>
            @endforeach
        </div>
    </div>
    <div class="widget widget_hot">
        <h3><i class="fa fa-link" style="margin-right: 10px;"></i>友情链接</h3>
        <div style="padding: 10px">
            @foreach($sidebarLinks as $item)
                <a class="friend" href="{{$item['url']}}" target="_blank">{{$item['name']}}</a>
            @endforeach
        </div>
    </div>

</aside>
<script src="{{asset_blog('calendar/js/schedule.js')}}"></script>
<script src="{{asset('flipclock/js/flipclock.min.js')}}"></script>
<script>
    $(function () {
        $('.tags').each(function () {
            console.log($(this).attr('id'));
            tagColor($(this).attr('id'));
        })
    });

    function randomSort(a, b) {
        return Math.random() > .5 ? -1 : 1;
    }

    function tagColor(id) {
        let arr = [
            'rgba(111, 163, 239)',
            'rgba(188, 153, 196)',
            'rgba(249, 187, 60)',
            'rgba(232, 88, 61)',
            'rgba(70, 196, 124)',
            // '#2491F6',
            // '#F63434',
            // '#F69534',
            // '#07A280',
        ];
        arr.sort(randomSort);
        let index = id % arr.length;
        $('.tag-' + id).css('background', arr[index]);
        $('.tag-' + id).css('color', '#fff');
    }

    // function tagColor(id) {
    //     let arr = [
    //         'rgba(111, 163, 239',
    //         'rgba(188, 153, 196',
    //         'rgba(249, 187, 60',
    //         'rgba(232, 88, 61',
    //         'rgba(70, 196, 124',
    //     ];
    //     let index = id % arr.length;
    //     $('.tag-' + id).css('background', arr[index] + ',0.5)');
    //     $('.tag-' + id).css('color', '#fff');
    //     $('.tag-' + id).hover(function () {
    //         $(this).css('background', arr[index] + ')')
    //     }, function () {
    //         $(this).css('background', arr[index] + ',0.5)');
    //     });
    // }

    var mySchedule = new Schedule({
        el: '#schedule-box',	//容器元素
        date: '{{date('Y-m-d')}}',		//当前日期
        // disabledBefore: '2018-07-10',	//禁用此日期之前
        // disabledAfter: '2018-11-15',	//禁用此日期之后
        // disabledDate: ['2018-8-20', '2018-8-2', '2018-8-23'],	//禁用的日期
        selectedDate: ['{{date('Y-1-13')}}', '{{date('Y-7-17')}}', '{{date('Y-10-13')}}',],	//选中的日期
        // showToday: true,	//回到今天
        // clickCb: function (date) {
        //     document.querySelector('#h3Ele').innerHTML = '日期：' + date
        // },
        nextMonthCb: function (currentYear, currentMonth) {
            console.log('currentYear:' + currentYear, 'currentMonth:' + currentMonth)
        },
        nextYeayCb: function (currentYear, currentMonth) {
            console.log('currentYear:' + currentYear, 'currentMonth:' + currentMonth)
        },
        prevMonthCb: function (currentYear, currentMonth) {
            console.log('currentYear:' + currentYear, 'currentMonth:' + currentMonth)
        },
        prevYearCb: function (currentYear, currentMonth) {
            console.log('currentYear:' + currentYear, 'currentMonth:' + currentMonth)
        }
    });
    $('.clock').FlipClock({
        clockFace: 'TwentyFourHourClock',
    });
</script>
