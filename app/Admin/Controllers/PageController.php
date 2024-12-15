<?php

namespace App\Admin\Controllers;

use App\Models\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Page';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        \Session::forget('error');
        $grid = new Grid(new Page());

        $grid->disableFilter();
        $grid->disableColumnSelector();
        $grid->disableExport();

        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
		});

        $grid->column('id', __('Id'));
        $grid->column('slug', __('Slug'));
        $grid->column('title_en', __('Title English'));
        $grid->column('title_ar', __('Title Arabic'));
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
        $show = new Show(Page::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('slug', __('Slug'));
        $show->field('title_en', __('Title en'));
        $show->field('title_ar', __('Title ar'));
        $show->field('body_en', __('Body en'));
        $show->field('body_ar', __('Body ar'));
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
        $form = new Form(new Page());

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

        $form->text('slug', __('Slug'))->required();
        $form->text('title_en', __('Title English'))->required();
        $form->text('title_ar', __('Title Arabic'))->required();
        $form->textarea('body_en', __('Body English'))->required();
        $form->textarea('body_ar', __('Body Arabic'))->required();

        return $form;
    }
}
