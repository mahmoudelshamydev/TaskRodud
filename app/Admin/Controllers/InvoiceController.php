<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\HasResourceActions;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use App\Mail\InvoiceMail;
use Mail;

use App\User;
use App\Models\Setting;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\PaymentStatus;
use App\Models\Requests;

class InvoiceController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    // protected $title = 'Invoice';
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {

        return $content
            ->header('Invoice')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Invoice')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Invoice')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */

    public function create(Content $content)
    {
        return $content
            ->header('Invoice')
            ->body($this->form());
    }

    public function store(Request $request)
    {
		return $this->saveInvoice(null, $request , 'create');
	}

    public function update($id, Request $request)
    {
    	Invoice::findOrFail($id);
		return $this->saveInvoice($id, $request , 'update');
    }

    public function saveInvoice( $invoice_id, Request $request , $action )
    {

        if($request->fees == null){
            // dd('save',$request->fees);
            $error = new MessageBag([
                'title'   => 'Error...',
                'message' => 'Fees required....',
            ]);
            // return redirect()->back()->withInput()->withErrors(['fees'=> 'error text']);
            return redirect()->back()->withInput()->with(compact('error'));
        }
        if($action=='update' && ($request->payment_status_id == 2 ||  $request->payment_status_id == null))
        {
            Invoice::updateOrCreate(['id' => $invoice_id],['payment_status_id' => 4]);
        }elseif($action=='update' && $request->payment_status_id == 1){
            Invoice::updateOrCreate(['id' => $invoice_id],[
                'fees' => $request->fees,
                'amount' => $request->amount,
                'discount' => $request->discount,
                'request_id' => $request->request_id,
                'payment_id' => $request->payment_id,
                'payment_status_id' => $request->payment_status_id
            ]);
            return redirect()->route('admin.invoice.index');
        }

        $invoice = Invoice::updateOrCreate([
            'number_invoice' => $this->generateInvoiceUniqueNumber(),
            'fees' => $request->fees,
            'amount' => $request->amount,
            'discount' => $request->discount,
            'link' => $this->generateInvoiceUniqueToken(),
            'request_id' => $request->request_id,
            'payment_id' => $request->payment_id,
            'payment_status_id' => $request->payment_status_id??2
        ]);

        $order = Requests::updateOrCreate(['id' => $invoice->request_id],[
            'amount' => $invoice->amount,
            'payment_status_id' => $invoice->payment_status_id,
            'payment_id' => $invoice->payment_id
        ]);

        $order = Requests::with(['service','make','model','payment'])->where('id',$order->id)->first();

        if($order->user_id){
            $user = User::find($order->user_id);
            if($user->is_notified){


                $setting = Setting::first();
                $title = $setting->title_notifications_save_invoice;
                $title_rep = str_replace('[name]', $order->user_name, $title);
                $number_request = $order->number_request;
                $desc = $setting->desc_notifications_save_invoice;
                $desc_rep = str_replace('[number_order]', $number_request, $desc);

                sendNotification($order->user_id , $order->id, $title_rep, $desc_rep);


            }
        }

        Mail::to($order->user_email)->send(new InvoiceMail($order,$invoice));

        return redirect()->route('admin.invoice.index');
    }

    public function generateInvoiceUniqueNumber()
    {
        $invoiceUniqueNumber = rand(10000000, 99999999);
        $invoice = Invoice::where('number_invoice', $invoiceUniqueNumber)->first();

        if (!$invoice) {
            return $invoiceUniqueNumber;
        }

        $this->generateInvoiceUniqueNumber();
    }

    public function generateInvoiceUniqueToken()
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lengthMax = strlen($caracteres);
        $invoiceUniqueToken = '';
        for ($i = 0; $i < 20; $i++)
        {
            $invoiceUniqueToken .= $caracteres[rand(0, $lengthMax - 1)];
        }
        $invoice = Invoice::where('link', $invoiceUniqueToken)->first();

        if (!$invoice) {
            return $invoiceUniqueToken;
        }

        $this->generateInvoiceUniqueToken();
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        \Session::forget('error');
        $grid = new Grid(new Invoice());

        $grid->disableFilter();
        $grid->disableColumnSelector();
        $grid->disableExport();

        $grid->actions(function ($actions) {
			$actions->disableView();
		});

        $grid->column('id', __('Id'));
        $grid->column('request.number_request', __('Request Number'));
        $grid->column('request.user_name', __('Customer Name'));
        $grid->column('number_invoice', __('Invoice Number'));
        $grid->column('paymentStatus.name_en', __('Status'));
        $grid->column('amount', __('Amount'));
        $grid->column('discount', __('Discount'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->actions(function ($actions) {
            $invoiceDetails = Invoice::find($actions->getKey());
            $actions->disableEdit();
            $actions->disableView();
            $actions->prepend('<a href="/admin/invoices/' . $actions->getKey()  . '/print"' . ' target="_blank"><i class="fa fa-print"></i></a>');
            if($invoiceDetails->payment_status_id!=4)
            {
                $actions->prepend('<a href="/admin/invoices/' . $actions->getKey()  . '/edit"' . ' target="_blank"><i class="fa fa-pencil"></i></a>');
            }
        });
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
        $show = new Show(Invoice::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('number_invoice', __('Number invoice'));
        $show->field('fees', __('Fees'));
        $show->field('amount', __('Amount'));
        $show->field('link', __('Link'));
        $show->field('expared', __('Expared'));
        $show->field('request_id', __('Request id'));
        $show->field('payment_id', __('Payment id'));
        $show->field('payment_status_id', __('Payment status id'));
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
    protected function form()
    {
        $form = new Form(new Invoice());

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

        $orders = Requests::all();
        $orderRequests = [];
        foreach($orders as $order){
            $orderRequests[$order['id']] = $order['number_request'].'-'.$order['user_name'];
        }

        $form->select('request_id', 'Requests')->options($orderRequests);
        $form->table('fees', function ($table) {
            $table->text('Qts');
            $table->text('Service');
            $table->text('Amount');
        });
        $form->decimal('amount', __('Amount'))->default(0.00);
        $form->decimal('discount', __('Discount'))->default(0.00);
        $form->select('payment_id', 'Payment method')->options(Payment::where('is_active', 1)->get()->pluck('name_en', 'id'));
        $form->select('payment_status_id', 'Payment status')->options(PaymentStatus::whereIn('id', array(1, 2))->get()->pluck('name_en', 'id'));

        return $form;
    }

    public function printInvoice(Request $request , $invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
        $order = Requests::with(['service','make','model','payment'])->where('id',$invoice->request_id)->first();
        $service_info = json_decode($order['service_info'], true);
        $addresse_info = json_decode($order['addresse_info'], true);
        $setting = Setting::find(1);
        $subject='Invoice';

        return view('admin.invoices.invoice')->with(compact('invoice',
        'order','service_info','addresse_info','setting','subject'));

    }

}
