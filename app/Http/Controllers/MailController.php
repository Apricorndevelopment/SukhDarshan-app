<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class MailController extends Controller
{
    function sendEmail(Request $request)
    {
        $to = $request->to;
        $msg = $request->message;
        $subject = $request->subject;
        $firstname = $request->first_name;
        $lastname = $request->last_name;
        Mail::to($to)->send(new WelcomeEmail($msg, $subject, $firstname, $lastname));
        return view('contact');
    }
}
