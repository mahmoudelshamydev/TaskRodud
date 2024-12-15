<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Setting;

class StatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $service_info;
    public $addresse_info;
    public $setting;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->service_info = json_decode($data['service_info'], true);
        $this->addresse_info = json_decode($data['addresse_info'], true);
        $this->setting = Setting::find(1);
        $this->subject='Change Status';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.status');
    }
}
