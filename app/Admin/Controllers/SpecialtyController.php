<?php

namespace App\Admin\Controllers;

use App\Specialty;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SpecialtyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Specialty';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Specialty());

        $grid->column('id', __('Id'));
        $grid->column('name_en', __('name en'));
        $grid->column('icon', __('Icon'))->image();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Specialty::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Specialty());

        $form->text('name_en', __('name en'));
        $form->text('name_ar', __('name ar'));
        $form->image('icon', __('Icon'));
        $states = [
            'off' => ['value' => 0, 'text' => 'disabled', 'color' => 'danger'],
            'on' => ['value' => 1, 'text' => 'enabled', 'color' => 'success'],
        ];
        $form->switch('is_active', 'Active')->states($states)->default(1);
        return $form;
    }
}
