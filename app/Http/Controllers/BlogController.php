<?php

namespace App\Http\Controllers;

use App\Imports\TestImport;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use App\Services\RssFeed;
use App\Services\SiteMap;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class BlogController extends Controller
{
    //
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $postService = new PostService($tag);
        $data = $postService->list();
        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';
        return view($layout, $data);
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->where('slug', $slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::query()->where('tag', $tag)->firstOrFail();
        }
        return view($post->layout, compact('post', 'tag'));
    }

    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRss();

        return response($rss)
            ->header('Content-type', 'application/rss+xml');
    }

    public function siteMap(SiteMap  $siteMap)
    {
        $map = $siteMap->getSiteMap();

        return response($map)
            ->header('Content-type', 'text/xml');
    }

    public function excel()
    {
        $excel_data1 =Excel::toArray(new TestImport(),storage_path('users.xlsx'));
        $data1 = $excel_data1[0];
        unset($data1[0]);
        unset($data1[1]);
        $data1 = array_values($data1);
        $username1 = [];
        foreach ($data1 as $v){
            $username1[] = $v[2];
        }

        $excel_data2 =Excel::toArray(new TestImport(),storage_path('usersInfo.xlsx'));
        $data2 = $excel_data2[0];
        unset($data2[0]);
        unset($data2[1]);
        $username2 = [];
        $keys = [];
        foreach ($data2 as $k => $v){
            $username2[] = $v[4];
            $keys[$v[4]] = $k;
        }
        dd($data2,$username2,$keys);

    }
}
