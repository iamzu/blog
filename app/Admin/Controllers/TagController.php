<?php

namespace App\Admin\Controllers;

use App\Models\Tag;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class TagController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Tag(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('tag','名称');
            $grid->column('title','标题');
            $grid->column('subtitle','副标题');
            $grid->column('meta_description','介绍');
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
        return Show::make($id, new Tag(), function (Show $show) {
            $show->field('id');
            $show->field('layout');
            $show->field('meta_description');
            $show->field('page_image');
            $show->field('reverse_direction');
            $show->field('subtitle');
            $show->field('tag');
            $show->field('title');
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
        return Form::make(new Tag(), function (Form $form) {
            $form->display('id');
            $form->text('layout');
            $form->text('meta_description');
            $form->text('page_image');
            $form->text('reverse_direction');
            $form->text('subtitle');
            $form->text('tag');
            $form->text('title');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
