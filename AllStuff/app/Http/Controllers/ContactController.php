<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactUs;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        
        // Create a new Contact model instance and save it to the database
        $contact = new ContactUs();
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->message = $validatedData['message'];
        $contact->save();


        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
