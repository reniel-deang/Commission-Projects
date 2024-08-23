<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Userdashboard extends Controller
{
    //

    public function display()
    {
        return view('dashboard');
    }

    public function newstudent(Request $request)
{
    $data = $request->validate([
        'expertise' => ['required', 'string', 'max:255'],
        'specialty' => ['required', 'array'], // Ensure specialty is validated as an array
    ]);

    // Serialize the data to JSON to store it in the 'interest' column
    $interest = [
        'expertise' => $data['expertise'],
        'specialty' => $data['specialty'], // Convert the array to JSON
    ];

    // Update the current user's 'interest' column
    $request->user()->update([
        'interest' => $interest,
        'verification' => 'true'
    ]);

    return view('dashboard');
}

}
