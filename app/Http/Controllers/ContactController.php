<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    
    // form to create mail
    public function send()
    {
        return view('public.contact.create');
    }

    //

    public function store(Request $request)
    {
        //dd(request()->all());

        $data = request()->validate([

            'name' => 'required',
            'email' => 'required |email',
            'message' => 'required',

        ]);
        
        // Send email after validation 

        Mail::to('test@test.com')->send(new ContactMail($data));

        return redirect('contact')->with('success', 'Your message has been sent successfully! I will back to you ASAP');

        
    }
}
