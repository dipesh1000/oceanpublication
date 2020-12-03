<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;

class RegistrationController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function postRegister(Request $request){

        $user = Sentinel::registerAndActivate($request->all());
        redirect('/register');
    }
}
