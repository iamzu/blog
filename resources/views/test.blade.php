<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('quietflow/css/index.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('quietflow/css/prism.css')}}">
</head>
<body>
        <h1>Test</h1>
</body>
<script src="{{asset_blog('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('quietflow/js/quietflow.min.js')}}"></script>
{{--<script src="{{asset('quietflow/js/index.js')}}"></script>--}}
{{--<script src="{{asset('quietflow/js/prism.js')}}"></script>--}}
<script type="text/javascript">
    /**
     * maxRadius 可以指定一个圆的最大随机半径。默认设置为40。
     * bounceSpeed 圆周运动的速度。默认设置为50
     * bounceBallCount 圈数。默认设置为50
     * transparent 布尔值使圆具有50％的不透明度。默认设置为true。
     */
    $("body").quietflow({
        theme : "bouncingBalls",
        maxRadius:15,
        specificColors : [
            'rgba(111, 163, 239)',
            'rgba(188, 153, 196)',
            'rgba(249, 187, 60)',
            'rgba(232, 88, 61)',
            'rgba(70, 196, 124)',
        ]
    })
</script>
</html>
