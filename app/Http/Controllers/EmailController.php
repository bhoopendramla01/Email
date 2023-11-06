<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;

class EmailController extends Controller
{
    public function index()
    {
        $data = ['name' => 'Bhoopendra Vidhayak',  'data' => 'Hello Vidhayak'];
        $user['to'] = 'bhoopendrasingh261090@gmail.com';
        Mail::send('mail',$data,function($message) use ($user){
            $message->to($user['to']);
            $message->subject('Registration Verification');
        });

        dd("Email is sent successfully.");
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

    public function create()
    {
        return view("registration");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->passes()) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            session()->flash('success', 'User added Successfully');

            return response()->json([
                'status' => true,
                'message' => 'User added Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
