<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnquiryController extends Controller
{
        public function store(Request $request)
    {
        // Validation for the form fields
        $rules = [
            'enquiry' => 'required|string',
        ];

        // Validate the form fields
        $validatedData = $request->validate($rules);

        // Get the user
        $user = Auth::user();

        // Update the user's enquiry field
        $user->enquiry = $validatedData['enquiry'];
        #dd($user instanceof \App\Models\User);
        $user->save();

        // Redirect back to the contact page with a success message
        return redirect()->route("contact")->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Enquiry Updated</div>');

    }

}



