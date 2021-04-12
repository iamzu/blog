<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
    #category li a:before { /* 添加一个折叠符号，为了好看 */
        content: "∟";
        position: absolute;
        left: 10px;
        bottom: 5px;
        font-size: 12px;
    }

</style>
<body>

<!-- 固定于屏幕右下方的一个悬浮按钮 -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large blue z-depth-4">
        <i class="large material-icons">apps</i>
    </a>
    <ul>
        <!-- 文章目录按钮 -->
        <li class="category-btn hide">
            <a class="sidenav-trigger btn-floating blue lighten-2" data-target="category">
                <i class="material-icons">format_list_bulleted</i>
            </a>
        </li>
        <!-- 下面也可以添加其他按钮，如返回文章顶部等-->
        <li>
            <a class="btn-floating blue lighten-2" href="javascript: scrollTo(0, 0);">
                <i class="material-icons">publish</i>
            </a>
        </li>
    </ul>
</div>

<!-- 文章目录侧栏 -->
<ul id="category" class="hide sidenav grey lighten-4 grey-text text-darken-3">
    <li><p class="center-align">目录</p></li>
</ul>

<!-- 下面的元素中存放文章内容 -->
<div id="post-content">
    <!-- 文章内容，需要注意的只有，为不同的标题元素设置不同的 id 属性以实现跳转 -->
    <!-- 以下为示例内容 -->
    <h1 id="t1">Title 1</h1>
    <p>Hello World!</p>
    <p>Hello World!</p>

    <h2 id="t11">Title 1</h2>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>

    <h2 id="t12">Title 1</h2>
    <h3 id="t121">Title 1</h3>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>

    <h1 id="t2">Title 2</h1>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>

    <h1 id="t3">Title 3</h1>
    <p>Hello World!</p>

    <h2 id="t31">Title 3</h2>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>
    <p>Hello World!</p>
</div>

</body>
<script type="text/javascript">
    // 初始化第三方库的插件
    M.AutoInit();
    document.addEventListener('DOMContentLoaded', function () {
        var elemCategory = document.querySelector('#category');
        M.Sidenav.init(elemCategory, {
            'edge': 'right' // right 表示在右侧栏显示，left 则表示在左边显示
        });
    });

    var postContent = document.querySelector('#post-content');

    if (postContent) { // 存在文章内容
        var categories = postContent.querySelectorAll('h1, h2, h3, h4, h5, h6');

        if (categories.length > 0) { // 文章存在标题
            var category = document.querySelector('#category'),
                categoryBtn = document.querySelector('.category-btn');
            var li = document.createElement('li'),
                a = document.createElement('a');

            a.className = 'waves-effect';
            // 存在目录则显示目录按钮和侧栏
            category.classList.remove('hide');
            categoryBtn.classList.remove('hide');

            categories.forEach(node => {
                // 每次 cloneNode 取代 createElement
                // 因为克隆一个元素快于创建一个元素
                var _li = li.cloneNode(false),
                    _a = a.cloneNode(false);

                _a.innerText = node.innerText;
                // 为标题设置跳转链接
                _a.href = '#' + node.id;
                _li.appendChild(_a);
                // 为不同级别标题应用不同的缩进
                console.log(node.nodeName);
                _li.style.paddingLeft = node.nodeName.slice(-1) * 17 + 'px';
                category.appendChild(_li);
            })
        }
    }

</script>
</html>
