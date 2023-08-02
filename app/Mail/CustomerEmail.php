<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerEmail extends Mailable
{
  use Queueable, SerializesModels;

  public $customer;

  public function __construct($customer)
  {
    $this->customer = $customer;
  }

  public function build()
  {
    return $this->view('email.customer');
  }
}