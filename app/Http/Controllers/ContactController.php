<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
{
    // Logic to display the contact form view
    return view('contact');
}
    
    public function send(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
        'website' => 'nullable|url',
        'message' => 'required|min:10',
    ]);

    try {
        // Send email
        Mail::to('hasnainalikhan2001@gmail.com')->send(new ContactMail($validatedData));
        return redirect()->back()->with('success', 'Email sent successfully!');
    } catch (\Exception $e) {
        // Handle the exception
        \Log::error('Error sending email: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while sending the email.');
    }
}

}
