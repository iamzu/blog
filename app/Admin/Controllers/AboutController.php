<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Post;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Tag;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Form;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Content $content,Request  $request)
    {
        return $content
            ->title('关于')
            ->body(function (Row $row) {
                $info = About::query()->first();
                $form = Form::make();
                if($info){
                    $form->markdown('content', '')->value($info->content_raw);
                    $form->hidden('id')->value($info->id);
                }else{
                    $form->markdown('content', '');
                    $form->hidden('id');
                }
                $row->column(12, Card::make($form));
            });

    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        $content = $request->input('content');
        About::query()->where('id',$id)->updateOrCreate(['content_raw' => $content]);
        return response()->json([
            'status' => true,
            'data' => [
                'message' =>"修改成功",
                'type' => "success",
                'then' => [
                    'action' => 'redirect',
                    'value' => '/manage/about'
                ]
            ]
        ]);
    }

}
