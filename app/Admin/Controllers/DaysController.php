<?php

namespace App\Admin\Controllers;

use App\Models\Days;
use Encore\Admin\Controllers\AdminController;
Use Encore\Admin\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DaysController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Days';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        \Session::forget('error');
        $grid = new Grid(new Days());

        $grid->disableFilter();
        $grid->disableColumnSelector();
        $grid->disableExport();
        $grid->disableCreateButton();

        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
		});

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Days::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('created_at', __('Created at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Days());

        $form->tools(function (Form\Tools $tools) {
            // Disable `Veiw` btn.
            $tools->disableView();
            // Disable `Delete` btn.
            $tools->disableDelete();
        });

        $form->footer(function ($footer) {
            // disable `View` checkbox
            $footer->disableViewCheck();

            // disable reset btn
            $footer->disableReset();

            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();
        });

        Admin::style('.remove {display: none;}');
        Admin::style('.add {display: none;}');

        $form->text('name', __('Name'));
        $form->hasMany('time_slots', function (Form\NestedForm $form) {
            $form->time('time', __('Time'))->readonly();
            $form->number('number_request', __('Number request'))->default(4);
            $states = [
                'off' => ['value' => 0, 'text' => 'disabled', 'color' => 'danger'],
                'on' => ['value' => 1, 'text' => 'enabled', 'color' => 'success'],
            ];
            $form->switch('is_active', 'Active')->states($states)->default(0);
        });

        return $form;
    }
}
