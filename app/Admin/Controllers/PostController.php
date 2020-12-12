<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
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
        return Grid::make(new Post(), function (Grid $grid) {
            $grid->model()->orderBy('published_at', 'desc');
            $grid->column('id')->sortable();
            $grid->column('title')->width(150);
            $grid->column('subtitle')->width(250);
            $grid->column('page_image');
            $grid->column('meta_description');
            $grid->column('is_draft', '草稿')->switch();
            $grid->column('published_at','发布时间');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

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
        return Form::make(new Post(), function (Form $form) {
            $form->display('id');
            $form->text('title')->required();
            $form->textarea('subtitle')->required();
            $form->image('page_image')->thumbnail('small', '300', '150')->autoUpload();
            $form->markdown('content_raw')->height(1000);
            $form->textarea('meta_description');
            $form->switch('is_draft', '草稿')->customFormat(function ($v) {
                return $v === '打开' ? 1 : 0;
            });
//            $form->text('layout');
            $form->datetime('published_at');
            $form->display('created_at');
            $form->display('updated_at');

        });
    }
}
