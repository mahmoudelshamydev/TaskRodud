<?php

namespace App\Admin\Controllers;
//use App\User;

use App\Lawyer;
use Encore\Admin\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Encore\Admin\Controllers\HasResourceActions;
use App\Specialty;
use Illuminate\Support\Facades\Hash;

class LawyerController extends Controller
{
    use HasResourceActions;

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Lawyer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */

    public function index(Content $content)
    {

        return $content
            ->header('Lawyers')
            ->body($this->grid());
    }     


    public function create(Content $content)
    {
        return $content
            ->header('Lawyer')
            ->body($this->form());
    }

    protected function grid()
    {
        $grid = new Grid(new Lawyer());

        $grid->disableColumnSelector();
        $grid->disableExport();

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('name','Name');
            $filter->equal('email','Email');
            $filter->equal('phone','Mobile');
        });

        $grid->actions(function ($actions) {
			$actions->disableView();
		});

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('number_consultations', __('Num consultations'));

        $grid->column('Mobile')->display(function () {
            return $this->phone_prefix.' '.$this->phone;
        });
        $grid->column('Notified')->display(function () {
            if ($this->is_notified == 0) {
                return "<span style='color: red;'>Not Notified</span>";
            } else {
                return "<span style='color: #00a65a	;'>Notified</span>";
            }
        });
        $grid->column('Status')->display(function () {
            if ($this->is_active == 0) {
                return "<span style='color: red;'>Not Active</span>";
            } else {
                return "<span style='color: #00a65a	;'>Active</span>";
            }
        });
        $grid->column('Blocked')->display(function () {
            if ($this->is_blocked == 0) {
                return "<span style='color: red;'>Not Blocked</span>";
            } else {
                return "<span style='color: #00a65a	;'>Blocked</span>";
            }
        });
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
        $show = new Show(Lawyer::findOrFail($id));



        return $show;
    }
    public function edit($id, Content $content)
    {
        return $content
            ->header('User')
            ->body($this->form($id)->edit($id));
    }

    public function store(Request $request)
    {
        // dd($request);

        $Lawyer = Lawyer::updateOrCreate([
            'membership_id'  => $request->membership_id,
            'consultations_fees'  => $request->consultations_fees,            
            'name'  => $request->name,
            'email'  => $request->email,
            'password'  => Hash::make($request->password),
            // 'phone_prefix'  => $request->phone_prefix,
            'phone'  => $request->phone,
            'is_active'  => $request->is_active == 'on' ? 1 : 0,
            'is_notified'  => $request->is_notified == 'on' ? 1 : 0,
            'is_blocked'  => $request->is_blocked == 'on' ? 1 : 0,
            'specialty_id' => $request->specialty
        ]);

        // if($request->has('addresses')){
        //     foreach ($request->get('addresses') as $addresse) {
        //         if($addresse['_remove_'] == 1){
        //             Addresse::find($addresse['id'])->delete();
        //         }
        //         else{
        //             Addresse::updateOrCreate([
        //                 'addresse_name'   => $addresse['addresse_name'],
        //                 'area_id'   => $addresse['area_id'],
        //                 'street'   => $addresse['street'],
        //                 'block'   => $addresse['block'],
        //                 'avenue'   => $addresse['avenue'],
        //                 'building'   => $addresse['building'],
        //                 'extra_info'   => $addresse['extra_info'],
        //                 'lat'   => $addresse['lat'],
        //                 'lng'   => $addresse['lng'],
        //                 'is_default'   => $addresse['is_default'] == 'on' ? 1 : 0,
        //                 'user_id' => $user->id
        //             ]);
        //         }
        //     }
        // }

        // if($request->has('cars')){
        //     foreach ($request->get('cars') as $car) {
        //         if($car['_remove_'] == 1){
        //             Car::find($car['id'])->delete();
        //         }
        //         else{
        //             Car::updateOrCreate([
        //                 'name'   => $car['name'],
        //                 'make_id'   => $car['make_id'],
        //                 'model_id'   => $car['model_id'],
        //                 'year'   => $car['year'],
        //                 'license_plate'   => $car['license_plate'],
        //                 'is_default'   => $car['is_default'] == 'on' ? 1 : 0,
        //                 'user_id' => $user->id
        //             ]);
        //         }
        //     }
        // }

        return redirect()->route('admin.lawyers.index');

    }
    public function update(Request $request , $id)
    {
        $last_Lawyer = Lawyer::find($id);

        $img = $last_Lawyer->img;

        if($request->file('img') != null){
            $file2 = $request->file('img');
            $filename2 = time() . md5($file2->getClientOriginalName());
            $file2->move('uploads/requests',$filename2);
            $img = 'uploads/requests/'.$filename2;
        }




        $Lawyer = Lawyer::updateOrCreate(['id'=>$id],[


            'membership_id'  => $request->membership_id,
            'consultations_fees'  => $request->consultations_fees,
            'name'  => $request->name,
            // 'name2'  => $request->name2,
            'img'  => $img,
            // 'relationship1'  => $request->relationship1,
            // 'relationship2'  => $request->relationship2,
            'email'  => $request->email,
            'password'  => $last_Lawyer->password != $request->password ? Hash::make($request->password) : $request->password,
            //'phone_prefix'  => $request->phone_prefix,
            'phone'  => $request->phone,
            // 'phone2'  => $request->phone2,
            'is_active'  => $request->is_active == 'on' ? 1 : 0,
            'is_notified'  => $request->is_notified == 'on' ? 1 : 0,
            'is_blocked'  => $request->is_blocked == 'on' ? 1 : 0,
            'specialty_id' => $request->specialty
        ]);

        // if($request->has('addresses')){
        //     foreach ($request->get('addresses') as $addresse) {
        //         if($addresse['_remove_'] == 1){
        //             Addresse::find($addresse['id'])->delete();
        //         }
        //         else{
        //             Addresse::updateOrCreate(['id'=>$addresse['id']],[
        //                 'addresse_name'   => $addresse['addresse_name'],
        //                 'area_id'   => $addresse['area_id'],
        //                 'street'   => $addresse['street'],
        //                 'block'   => $addresse['block'],
        //                 'avenue'   => $addresse['avenue'],
        //                 'building'   => $addresse['building'],
        //                 'extra_info'   => $addresse['extra_info'],
        //                 'lat'   => $addresse['lat'],
        //                 'lng'   => $addresse['lng'],
        //                 'is_default'   => $addresse['is_default'] == 'on' ? 1 : 0,
        //                 'user_id' => $user->id
        //             ]);
        //         }
        //     }
        // }

        // if($request->has('cars')){
        //     foreach ($request->get('cars') as $car) {
        //         if($car['_remove_'] == 1){
        //             Car::find($car['id'])->delete();
        //         }
        //         else{
        //             Car::updateOrCreate(['id'=>$car['id']],[
        //                 'name'   => $car['name'],
        //                 'make_id'   => $car['make_id'],
        //                 'model_id'   => $car['model_id'],
        //                 'year'   => $car['year'],
        //                 'license_plate'   => $car['license_plate'],
        //                 'is_default'   => $car['is_default'] == 'on' ? 1 : 0,
        //                 'user_id' => $user->id
        //             ]);
        //         }
        //     }
        // }

        return redirect()->route('admin.lawyers.index');
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Lawyer());

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

        // $form->tab('User Informations', function ($form) {
            $form->text('name', __('name'))->required();
            $form->text('phone', __('phone'));
            $form->text('membership_id', __('membership_id'));
            // $form->text('number_consultations', __('number_consultations'));

            $form->text('consultations_fees', __('consultations_fees'));

          // $form->text('phone_prefix', __('Phone prefix'));
            // $form->text('phone2', __('alternative guardian`s phone'));

            // $form->text('relationship2', __('alternative guardian`s relationship'));





            $form->email('email', __('Email'))->required();
            $form->password('password', __('Password'))->default(function ($form) {
                return $form->model()->password;
            });

            $states = [
                'off' => ['value' => 0, 'text' => 'disabled', 'color' => 'danger'],
                'on' => ['value' => 1, 'text' => 'enabled', 'color' => 'success'],
            ];
            $form->switch('is_active', 'Active')->states($states)->default(1);
            $form->switch('is_notified', 'Notified')->states($states)->default(1);
            $form->switch('is_blocked', 'Blocked')->states($states);

            $form->select('specialty', __('specialty'))->options(Specialty::all()->pluck('name', 'id'));
            $form->image('img', __('image'))->move('uploads')->uniqueName();

        // });

        // $form->tab('Addresses', function ($form) use($id) {
        //     $form->hasMany('addresses', 'Addresse', function (Form\NestedForm $form) use($id){
        //         $addresse = new Addresse();
        //         if($form->getKey()!='new___LA_KEY__')
        //         {
        //             $addresse = Addresse::find($form->getKey());
        //         }
        //         $form->text('addresse_name','Addresse Name')->required()->default($addresse->addresse_name);
        //         $form->select('area_id', 'Area')->options(Area::all()->pluck('name_en', 'id'))->required()->default($addresse->area_id);
        //         $form->text('street','Street')->required()->default($addresse->street);
        //         $form->text('block','Block')->required()->default($addresse->block);
        //         $form->text('avenue','Avenue')->default($addresse->avenue);
        //         $form->text('building','Building')->required()->default($addresse->building);
        //         $form->text('extra_info','Extra Informations')->default($addresse->extra_info);
        //         $form->latlong('lat', 'lng', 'Location')->default(['lat' => $addresse->lat, 'lng' => $addresse->lng]);
        //         $states = [
        //             'off' => ['value' => 0, 'text' => 'disabled', 'color' => 'danger'],
        //             'on' => ['value' => 1, 'text' => 'enabled', 'color' => 'success'],
        //         ];
        //         $form->switch('is_default', 'Default')->states($states)->default($addresse->is_default);
        //         $form->hidden('user_id')->value($id);
        //     });
        // });
        // $form->tab('Cars', function ($form) use($id) {
        //     $form->hasMany('cars', 'Car', function (Form\NestedForm $form) use($id){
        //         $car = new Car();
        //         if($form->getKey()!='new___LA_KEY__')
        //         {
        //             $car = Car::find($form->getKey());
        //         }
        //         $form->text('name','Name')->required()->default($car->name);
        //         $form->select('make_id', 'Make')->options(CarMake::all()->pluck('name_en', 'id'))->required()->default($car->make_id);
        //         $form->select('model_id', 'Model')->options(CarModel::all()->pluck('name_en', 'id'))->required()->default($car->model_id);
        //         $form->text('year','Year')->required()->default($car->year);
        //         $form->text('license_plate','License Plate')->default($car->license_plate);
        //         $states = [
        //             'off' => ['value' => 0, 'text' => 'disabled', 'color' => 'danger'],
        //             'on' => ['value' => 1, 'text' => 'enabled', 'color' => 'success'],
        //         ];
        //         $form->switch('is_default', 'Default')->states($states)->default($car->is_default);
        //         $form->hidden('user_id')->value($id);
        //     });
        // });
        


        return $form;
    }
}
