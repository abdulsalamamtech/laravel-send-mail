<?php

namespace App\Http\Controllers;

use App\Mail\NewMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SendMailController extends Controller
{
    //
    public function send(Request $request){


        // Validate request data
        $data = $request->validate([
            'email' => ['required','email','max:50'],
            'subject' => ['required','string','max:50'],
            'message' => ['required','string','max:555'],
        ]);

        // Send mail
        \Mail::to($data['email'])->queue(new NewMail($data));

        // Redirect back
        return redirect()->back()->with('success', 'mail sent');
    }

}
