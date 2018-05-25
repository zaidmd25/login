<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Foundation\Auth\RegistersUsers;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;
    
	protected $redirectTo = '/home';	

	public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function log(Request $request)
    {
        $field = filter_var($request->get($this->firstname()), FILTER_VALIDATE_EMAIL)
            ? $this->firstname()
            : 'firstname';

        return [
            $field => $request->get($this->firstname()),
            'password' => $request->password,
        ];
    }
}
