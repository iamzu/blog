<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\BillType;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class BillTypeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new BillType(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('tag');
//            $grid->column('user_id');
            $grid->column('status')->switch();
            $grid->column('income_money')->display(function($val){ return '￥'.$val; });
            $grid->column('expenditure_money')->display(function($val){ return '￥'.$val; });
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
        return Show::make($id, new BillType(), function (Show $show) {
            $show->field('id');
            $show->field('tag');
            $show->field('user_id');
            $show->field('status');
            $show->field('income_money');
            $show->field('expenditure_money');
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
        return Form::make(new BillType(), function (Form $form) {
            $form->display('id');
            $form->text('tag');
//            $form->text('user_id');
            $form->switch('status');
//            $form->text('income_money');
//            $form->text('expenditure_money');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
