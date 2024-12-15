<?php

namespace App\Admin\Controllers;

use App\User;
use App\Models\AdminNotification;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Encore\Admin\Controllers\HasResourceActions;
use Illuminate\Support\Facades\Auth;
use App\Models\Requests;

class AdminNotificationController extends AdminController
{

    use HasResourceActions;

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Notification';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AdminNotification());

        $grid->disableFilter();
        $grid->disableColumnSelector();
        $grid->disableExport();

        $grid->actions(function ($actions) {
			$actions->disableView();
		});

        $grid->column('id', __('Id'));
        $grid->column('title_en', __('Title'));
        $grid->column('text_en', __('Text'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->model()->orderBy('id', 'desc');

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
        $show = new Show(AdminNotification::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title_en', __('Title en'));
        $show->field('title_ar', __('Title ar'));
        $show->field('text_en', __('Text en'));
        $show->field('text_ar', __('Text ar'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function store()
    {

                if(in_array("0", request()->users))
                {
                    sendNotification( null, '', request()->title_en, request()->text_en);
                }
                else
            {
                  $users = User::whereIn('id',request()->users)->get();
                 foreach ($users as $user) {
                     if($user->is_notified){
                          sendNotification($user->id ,'',request()->title_en, request()->text_en);
                     }
                 }
            }



            if(request()->allguest == "on"){
                sendNotification(null ,'',request()->title_en, request()->text_en,"guest");
            }
            AdminNotification::create(
                [
                    'title_en' => request()->title_en,
                    'text_en' => request()->text_en,
                ]
            );
            return redirect('/admin/admin_notifications');

    }
    protected function form()
    {
        $form = new Form(new AdminNotification());

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

        $form->text('title_en', __('Title '))->required();
        $form->textarea('text_en', __('Text '))->required();

        $a1=[0 => "All"];
        $array = User::all()->pluck('name','id')->toArray();
         $array[0] = "All";
         $form->multipleSelect('users','Users')->options(  ($array));


         $form->switch('allguest', 'all guest')->default(0);

        // $form->saved(function (Form $form) {
        //         dd(4234);
        //         if(in_array("0", $form->users))
        //         {
        //             sendNotification( null, '', $form->title_en, $form->text_en);
        //         }
        //         else
        //       {
        //           $users = User::whereIn('id',$form->users)->get();
        //          foreach ($users as $user) {
        //              if($user->is_notified){
        //                   sendNotification($user->id ,'',$form->title_en, $form->text_en);
        //              }
        //          }
        //      }
        // });

        return $form;
    }
}
