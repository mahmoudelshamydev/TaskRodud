<?php

namespace App\Admin\Controllers;

use App\Models\Days;
use App\Models\Service;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ServiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Service';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        \Session::forget('error');
        $grid = new Grid(new Service());

        $grid->disableFilter();
        $grid->disableColumnSelector();
        $grid->disableExport();

        $grid->actions(function ($actions) {
			$actions->disableView();
		});

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name_en', __('Name en'));
        $grid->column('name_ar', __('Name ar'));
        $grid->column('price', __('Price'));
        $grid->column('Discount')->display(function () {
            if ($this->discount == 0) {
                return "<span style='color: red;'>Not Discount</span>";
            } else {
                return "<span style='color: #00a65a	;'>Discount</span>";
            }
        });
        $grid->column('Status')->display(function () {
            if ($this->is_active == 0) {
                return "<span style='color: red;'>Not Active</span>";
            } else {
                return "<span style='color: #00a65a	;'>Active</span>";
            }
        });
        $grid->column('order', __('Order'));
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
        $show = new Show(Service::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name_en', __('Name en'));
        $show->field('name_ar', __('Name ar'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Service());

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
        });

        $states = [
            'off' => ['value' => 0, 'text' => 'disabled', 'color' => 'danger'],
            'on' => ['value' => 1, 'text' => 'enabled', 'color' => 'success'],
        ];

        $form->text('name_en', __('Name English'))->required();
        $form->text('name_ar', __('Name Arabic'))->required();
        $form->image('logo', __('Logo'))->move('uploads/services')->uniqueName()->required();
        $form->text('price', __('Price'))->required();
        $form->switch('discount', 'Discount')->states($states)->default(0);
        $form->date('discount_from', __('Discount from'));
        $form->date('discount_to', __('Discount to'));
        // $form->textarea('service_type', __('Service type'));
        // $form->textarea('tire_type', __('Tire type'));
        $form->multipleSelect('days','Days')->options(Days::all()->pluck('name','id'));

        $form->switch('show_service_type', 'Show service type')->states($states)->default(0);
        $form->table('service_type','Service type', function ($table) {
            $table->text('name_en','Name English');
            $table->text('name_ar','Name Arabic');
        });
        $form->switch('show_tire_size', 'Show tire size')->states($states)->default(0);
        $form->switch('show_tire_type', 'Show tire type')->states($states)->default(0);
        $form->table('tire_type','Tire type', function ($table) {
            $table->text('name_en','Name English');
            $table->text('name_ar','Name Arabic');
        });
        $form->switch('show_chassis_numb', 'Show chassis numb')->states($states)->default(0);
        $form->switch('show_numb_cylind', 'Show numb cylind')->states($states)->default(0);
        $form->switch('show_rim_size', 'Show rim size')->states($states)->default(0);
        $form->switch('show_numb_tire', 'Show numb tire')->states($states)->default(0);
        $form->switch('show_request_details', 'Show request details')->states($states)->default(0);
        $form->switch('show_special_request', 'Show special request')->states($states)->default(0);
        $form->switch('show_upload_photo', 'Show upload photo')->states($states)->default(0);
        $form->switch('is_active', 'Active')->states($states)->default(1);
        $form->number('order', __('Order'))->required();

        return $form;
    }
}
