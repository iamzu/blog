<?php


namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    use CommonActions;

    public function index()
    {
        $rotaryMaps = $this->rotaryMaps();
        $articleList = $this->articleList();
        $storage = Storage::disk(config('admin.upload.disk'));
        return view('blog-new.index', compact('rotaryMaps', 'articleList','storage'));
    }
}
