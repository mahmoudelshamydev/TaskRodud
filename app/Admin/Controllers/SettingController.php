<?php

namespace App\Admin\Controllers;

use App\Models\Setting;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SettingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Setting';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Setting());

        $grid->actions(function ($actions) {
			$actions->disableDelete();
            $actions->disableView();

		});
        $grid->disablePagination();

        $grid->disableCreateButton();

        $grid->disableFilter();

		$grid->disableColumnSelector();
		$grid->disableExport();

        $grid->column('id', __('Id'));
        $grid->column('facebook', __('Facebook'));
        $grid->column('instagram', __('Instagram'));
        $grid->column('twitter', __('Twitter'));
        $grid->column('email_req_submission', __('Email req submission'));
        $grid->column('email_req_rescheduling', __('Email req rescheduling'));
        $grid->column('email_contact_us', __('Email contact us'));
        $grid->column('system_email', __('System email'));
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
        $show = new Show(Setting::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('facebook', __('Facebook'));
        $show->field('instagram', __('Instagram'));
        $show->field('twitter', __('Twitter'));
        $show->field('email_req_submission', __('Email req submission'));
        $show->field('email_req_rescheduling', __('Email req rescheduling'));
        $show->field('email_contact_us', __('Email contact us'));
        $show->field('system_email', __('System email'));
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
        $form = new Form(new Setting());

        $form->tools(function (Form\Tools $tools) {
			// Disable `List` btn.
			$tools->disableList();
            // Disable `Veiw` btn.
            $tools->disableView();
            // Disable `Delete` btn.
            $tools->disableDelete();
        });

        $form->footer(function ($footer) {
            // disable `View` checkbox
            $footer->disableViewCheck();
            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();
            // disable reset btn
			$footer->disableReset();
			// disable `Continue editing` checkbox
            $footer->disableEditingCheck();
		});

        $form->image('static_banner_en', __('Static banner English'))->move('uploads/setting')->uniqueName();
        $form->image('static_banner_ar', __('Static banner Arabic'))->move('uploads/setting')->uniqueName();
        $form->text('home_title_en', __('Home title English'));
        $form->text('home_title_ar', __('Home title Arabic'));
        $form->textarea('home_desc_en', __('Home description English'));
        $form->textarea('home_desc_ar', __('Home description Arabic'));
        $form->text('facebook', __('Facebook'));
        $form->text('instagram', __('Instagram'));
        $form->text('twitter', __('Twitter'));
        $form->text('google_store_link', __('Google store link'));
        $form->text('app_store_link', __('App store link'));
        $form->text('email_req_submission', __('Email req submission'));
        $form->text('email_req_rescheduling', __('Email req rescheduling'));
        $form->text('email_contact_us', __('Email contact us'));
        $form->text('support_email', __('Support email'));
        $form->text('call_phone', __('Call Phone'));
        $form->text('whatsapp', __('Whatsapp'));
        $form->latlong('lat', 'lng', 'Location');
        $form->number('nbr_hour_activ_code', __('Nbr Hour Active Code'))->default(1);
        $form->textarea('chassis_information_en', __('chassis Information English'));
        $form->textarea('chassis_information_ar', __('chassis Information Arabic'));
        $form->textarea('about_us_footer_en', __('About_us in footer English'));
        $form->textarea('about_us_footer_ar', __('About_us in footer Arabic'));
        $form->textarea('our_vision_footer_en', __('Our_vision in footer English'));
        $form->textarea('our_vision_footer_ar', __('Our_vision in footer Arabic'));

        $form->textarea('title_notifications_change_status', __('title notifications change status'));
        $form->textarea('desc_notifications_change_status', __('desc notifications change status'));
        $form->textarea('title_notifications_new_order', __('title notifications new order'));
        $form->textarea('desc_notifications_new_order', __('desc notifications new order'));
        $form->textarea('title_notifications_save_invoice', __('title notifications save invoice'));
        $form->textarea('desc_notifications_save_invoice', __('desc notifications save invoice'));  
              
        $form->saved(function (Form $form) {
			return back();
		});

        return $form;
    }
}
