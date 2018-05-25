<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Reglog;

class SessionController extends Controller
{
    //
     public function create()
    {
    	// echo "sdfadsf";
    	// exit;
        return view('login.login');
    }
    
    public function dologin()
    // {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors(['message' => 'The email or password is incorrect, please try again']);
    // 	// echo "sdfadsf";
    // 	// exit;
    }
        
        return redirect()->to('/register');
    }
    
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->route('register');
    }
}
