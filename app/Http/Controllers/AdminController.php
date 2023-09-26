<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class AdminController extends Controller
{
    public function adminLogin(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['name' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/create-post');
        } else {
            return redirect('/admin');
        }
    }

    public function adminLogout()
    {
        auth()->logout();
        return redirect('/');
    }
}
