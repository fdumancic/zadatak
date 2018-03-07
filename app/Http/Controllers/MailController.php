<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailtrap;

class MailController extends Controller
{
    public function send()
    {
    	Mail::to('mailfortesting1108@gmail.com')->send(new Mailtrap());
    }
}
