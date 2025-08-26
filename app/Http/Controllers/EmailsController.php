<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    //
    public function sendEmail(){
        Mail::to('recipent@example.com')->send(new InvoiceMail());
        return "Email Sent Successfully";
    }
}
