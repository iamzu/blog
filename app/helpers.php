<?php

use Illuminate\Support\Str;

function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];

    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];

}


/**
 * 判断文件的MIME类型是否为图片
 * @param $mimeType
 */
function is_image($mimeType)
{
    return Str::startsWith($mimeType, 'image/');
}

/**
 * Return "checked" if true
 * @param $value
 */
function checked($value)
{
    return $value ? 'checked' : '';
}

/**
 * Return img url for headers
 * @param null $value
 */
function page_image($value = null)
{
    if (empty($value)) {
        $value = config('blog.page_image');
    }
    if (!Str::startsWith($value, 'http') && $value[0] !== '/') {
        $value = config('blog.uploads.webpath') . '/' . $value;
    }

    return $value;
}

/**
 * 静态文件路径
 * PhpStorm Live Template
 * bs asset_blog('$NAME$')
 * @param $path
 * @return mixed
 * Date: 2020/12/23 10:28
 */
function asset_blog($path)
{
    $version = 20210407;
    $path = '/blog_asset/'.$path."?v={$version}";
    return app('url')->asset($path, env('ASSET_HTTPS'));
}

/**
 * 二位数组元素替换键值
 * @param array  $arr
 * @param string $id
 * @return array|false
 */
function arrayCombine($arr = [], $id = '')
{
    $temp_key = array_column($arr, $id);  //键值 php5.5+
    $mobile_arr = array_combine($temp_key, $arr);
    return $mobile_arr;
}
