<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Setting;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $invoice;
    public $service_info;
    public $addresse_info;
    public $setting;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$invoice)
    {
        $this->order = $order;
        $this->invoice = $invoice;
        $this->service_info = json_decode($order['service_info'], true);
        $this->addresse_info = json_decode($order['addresse_info'], true);
        $this->setting = Setting::find(1);
        $this->subject='Invoice';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invoice');
    }
}
