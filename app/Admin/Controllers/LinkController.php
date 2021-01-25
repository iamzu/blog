<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Link;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class LinkController extends AdminController
{
    protected $title = '友链';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Link(), function (Grid $grid) {
            $grid->model()->orderBy('index','desc');
            $grid->column('id', 'ID')->sortable();
            $grid->column('name', '网站名称')->editable();
            $grid->column('email', '站长邮箱')->display(function ($v) {
                return $v ?: '无';
            });
            $grid->column('url', '网站地址')->link();
            $grid->column('index', '权重');
            $grid->column('status', '状态')->switch();
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
        return Show::make($id, new Link(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('email');
            $show->field('url');
            $show->field('index');
            $show->field('status');
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
        return Form::make(new Link(), function (Form $form) {
            $form->display('id');
            $form->text('name', '网站名称');
            $form->email('email', '站长邮箱');
            $form->url('url', '网站地址');
            $form->number('index', '权重');
            $form->switch('status', '状态')->value(1);

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
