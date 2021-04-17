<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\BillType;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Tree;
use Dcat\Admin\Widgets\Box;
use Dcat\Admin\Widgets\Form as TreeForm;

class BillTypeController extends AdminController
{

    public function index(Content $content)
    {
        return $content->header('账单类别')
            ->body(function (Row $row){
                $tree = new Tree(new BillType());
                $row->column(6,$tree);
                $row->column(6, function (Column $column) {
                    $form = new TreeForm();
                    $form->action(admin_url('/bill-type'));
                    $form->text('tag')->required();
                    $form->select('pid','父级')
                        ->options(\App\Models\BillType::query()->where('level',1)->pluck('tag', 'id'))->required();
                    $form->switch('status')->default(1);
                    $form->hidden('_token')->default(csrf_token());
                    $form->width(9, 2);
                    $column->append(Box::make(trans('admin.new'), $form));
                });
            });
    }

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
            $form->select('pid','父级')
                ->options(\App\Models\BillType::query()->where('level',1)->pluck('tag', 'id'))->required();
//            $form->text('user_id');
            $form->switch('status');
//            $form->text('income_money');
//            $form->text('expenditure_money');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
