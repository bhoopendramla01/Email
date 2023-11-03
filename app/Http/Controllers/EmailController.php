<?php

namespace App\Http\Controllers;
use Mail;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        $data = ['name' => 'Bhoopendra Vidhayak',  'data' => 'Hello Vidhayak'];
        $user['to'] = 'bhoopendrasingh261090@gmail.com';
        Mail::send('mail',$data,function($message) use ($user){
            $message->to($user['to']);
            $message->subject('Hello Email Verification');
        });
    }
}
