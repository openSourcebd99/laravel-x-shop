<?php

namespace App\Http\Controllers;

use App\Mail\CustomerEmail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
  public function sendEmails(Request $request)
  {
    $ids       = $request->input('ids');
    $customers = Customer::whereIn('id', $ids)->get();

    foreach ($customers as $customer) {
      // Queue the email
      Mail::to($customer->email)->queue(new CustomerEmail($customer));
    }

    return response()->json(['message' => 'Emails have been queued successfully.']);
  }
}