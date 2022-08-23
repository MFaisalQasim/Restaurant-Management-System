<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentDetail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;


    public function __construct($data)
    {
        $this->data = $data;
    }

   
    public function build()
    {
        return $this->from('a.moizkk1@gmail.com')
                    ->subject('Stripe Payment Confirmation')
                    ->view('Emails.PaymentDetail')
                    ->with('data',$this->data);
    }
}
