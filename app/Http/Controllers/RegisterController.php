<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reglog;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
//     public function create()
//     {
// 	// echo "dsfdsf";
// // exit;
//    	return view('login.create');

//     }

//     public function store()
//     {
//         $this->validate(request(), [
//             'firstname' => 'required|string|max:255',
//             'lastname' => 'required|string|max:20|unique:login',
//             'email' => 'required|string|email|max:255|unique:login',
//             'password' => 'required|string|min:6|confirmed',
//         ]);
        
//         $user = Reglog::create(request(['firstname', 'lastname', 'email', 'password']));
        
//         auth()->login($user);
        
//         return redirect()->to('register');
//     }
	use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

   
    public function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:login',
            'password' => 'required|string|min:3|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(array $data)
    {
        return Reglog::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
