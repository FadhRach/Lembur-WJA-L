<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\kirimEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail From Lembur WJA',
            'body' => 'Testing Email 123',
        ];

        Mail::to('auliafin11@gmail.com')->send(new kirimEmail($mailData));

        dd('email succcessfully');
    }
}
