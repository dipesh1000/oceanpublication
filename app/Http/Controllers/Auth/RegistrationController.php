<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendConfirmedEmail;
use App\Mail\RegisterUserMail;
use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Sentinel;

class RegistrationController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required'
        ]);
        $data = Sentinel::register($request->all());
        
        $activation = Activation::create($data);
        $data->activation = $activation->code;
        // Mail::to('aalok@mail.com')->send(new RegisterUserMail($data));

            $data = ['mail'=> 'test@mail.com', 'name'=> 'Jhon'];

        dispatch(new SendConfirmedEmail($data))->delay(Carbon::now()->addSeconds(5));
        return $data; 
    }
}
