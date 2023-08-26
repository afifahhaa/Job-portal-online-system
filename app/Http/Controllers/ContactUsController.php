<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function sendContactForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ]);

        Mail::send('emails.contact', $validatedData, function ($message) {
            $message->to('contact@example.com', 'Contact Us')->subject('New Contact Form Submission');
        });

        return redirect('/contact')->with('success', 'Your message has been sent successfully!');
    }
}
