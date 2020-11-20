<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

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

    public function Test(){
        $data = File::get("C:\Users\TS-380\Desktop\CounterRequest-2020-11-17.log");
        $data1 = explode("\n",$data);
        $uids = [];
        foreach ($data1 as &$v){
            $v = substr($v,43);
            $tmp = explode('= ',$v);
            $uid = end($tmp);
            $uids[] = (int)str_replace("'",'',$uid);
            echo $v.";".PHP_EOL;
        }

//        for ($i = 0 ; $i<count($uids);$i++){
//            echo "INSERT INTO `test`.`erp3_counter_request`( `i_user_id`, `i_group_id`, `i_company_id`, `u_username`, `u_truename`, `c_request`, `c_cpu`, `c_memory`, `c_network`, `c_disk`, `created_at`, `updated_at`) VALUES ( ".$uids[$i].", 0, 0, '', '', 0, 0, 0, 0, 0, NULL, NULL);".PHP_EOL;
//        }
    }
}
