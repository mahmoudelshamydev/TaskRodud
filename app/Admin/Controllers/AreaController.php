<?php

namespace App\Admin\Controllers;

use App\Models\Area;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AreaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Area';


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
         $grid = new Grid(new Area());

        $grid->disableFilter();
        $grid->disableColumnSelector();
        $grid->disableExport();

        $grid->actions(function ($actions) {
			$actions->disableView();
		});

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name_en', __('Name English'));
        $grid->column('name_ar', __('Name Arabic'));

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
        $show = new Show(Area::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Area());

        $form->tools(function (Form\Tools $tools) {
            // Disable `Veiw` btn.
            $tools->disableView();
            // Disable `Delete` btn.
            $tools->disableDelete();
        });

        $form->footer(function ($footer) {
            // disable `View` checkbox
            $footer->disableViewCheck();

            // disable reset btn mariem rady :D
            $footer->disableReset();
        });

        $form->text('name_en', __('Name English'))->required();
        $form->text('name_ar', __('Name Arabic'))->required();

        return $form;
    }
}
