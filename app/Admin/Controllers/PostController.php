<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Post;
use App\Models\Tag;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Models\Menu;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class PostController extends AdminController
{
    protected $title = '文章';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Post('tags'), function (Grid $grid) {
            $grid->model()->orderBy('is_draft', 'asc');
            $grid->model()->orderBy('updated_at', 'desc');
            $grid->column('id')->sortable();
            $grid->tags('标签')->pluck('tag')->label();
            $grid->column('title','标题')->width(150);
            $grid->column('subtitle','副标题')->width(250);
            $grid->column('page_image','封面图')->image('',100);
            $grid->column('meta_description','备注')->width(150);
            $grid->column('is_draft', '草稿')->switch();
//            $grid->column('published_at','发布时间')->sortable();
            $grid->column('created_at','创建/更新')->display(function(){
                return <<<HTML
            <span>{$this->created_at}</span>
            <br>
            <span>{$this->updated_at}</span>
HTML;
            });
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->in('tags.tag_id','标签')->multipleSelect(Post::tagOptions());
            });
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->append('<a href="'.route('blog.detail',['id' => $this->id]).'" title="预览" target="_blank"><i class="fa fa-file-text-o"></i></a>');
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Post(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('subtitle');
            $show->field('content_raw');
            $show->field('content_html');
            $show->field('page_image');
            $show->field('meta_description');
            $show->field('layout');
            $show->field('published_at');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Post('tags'),function (Form $form) {
            $form->display('id');
            $form->text('title')->required();
            $form->textarea('subtitle')->required();
            $form->tags('tags', '标签')
                ->pluck('tag', 'id') // name 为需要显示的 Tag 模型的字段，id 为主键
                ->options(Tag::all());
            $form->image('page_image')->thumbnail('small', '300', '150')->autoUpload();
            $form->markdown('content_raw')->height(1000)->required();
            $form->textarea('meta_description');
            $form->switch('is_draft', '草稿')->customFormat(function ($v) {
                return $v === '打开' ? 1 : 0;
            });
//            $form->text('layout');
//            $form->datetime('published_at');
            $form->display('created_at');
            $form->display('updated_at');

        });
    }
}
