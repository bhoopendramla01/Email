<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\SendMail;
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

    // public function indexv1()
    // {
        
    //     $mailData = [
    //         'title' => 'Mail from ItSolutionStuff.com',
    //         'body' => 'This is for testing email using smtp.'
    //     ];
         
    //     Mail::to('naresh.dollop@gmail.com')->send(new SendMail($mailData));
           
    //     dd("Email is sent successfully.");
    // }
}
