<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Bill;
use App\Models\BillType;
use App\Models\Tag;
use Carbon\Carbon;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Request;

class BillController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Bill(), function (Grid $grid) {
            $grid->model()->where('user_id',Admin::user()->id)->orderBy('created_at','desc');
            $grid->column('type')->using([1 => '支出', 2 => '收入'])->label([
                1 => 'default',
                2 => 'danger',
            ]);
            $grid->column('tag_id')->display(function () {
                return $this->tags->tag;
            })->label('info');
            $grid->column('money')->display(function ($val) {
                return '￥' . $val;
            })->sortable();
            $grid->column('remarks');
            $grid->column('created_at','日期')->display(function($val){
                return date('Y-m-d',strtotime($val));
            })->sortable();
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
        return Show::make($id, new Bill(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('tag_id');
            $show->field('type');
            $show->field('money');
            $show->field('remarks');
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
        return Form::make(new Bill(), function (Form $form) {
            $form->hidden('user_id')->value(Admin::user()->id);

            $form->select('parent_tag_id')
                ->options(BillType::all()->where('level', 1)->pluck('tag', 'id'))->required()->load('tag_id', route('sub-bill-type'));
            $form->select('tag_id')->required();
            $form->radio('type')->options(['1' => '支出', '2' => '收入'])->default('1');
            $form->currency('money')->symbol('￥');
            $form->textarea('remarks');
            $form->date('created_at','日期')->default(Carbon::now()->format('Y-m-d'))->required();
        });
    }
}
