<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\Request;
use Sentinel;
use Illuminate\Support\Facades\Session;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function adminLogin(){
        if(Sentinel::guest() == false){
            return redirect()->route('admin.dashboard');
        }
        return view('auth.adminlogin');
    }

    public function adminLoginPost(Request $request){

        $request->validate([
            'email'    => 'required|email',
            'password' => 'min:8|required'
        ]);

        $credentials = array(
            'email'    => $request->email,
            'password' => $request->password,
        );


        try {
            if ($user = Sentinel::authenticate($credentials)) {

                return redirect()->route('admin.dashboard');

            } else {
                Session::flash('failed', __('auth.login_unsuccessful'));


                return redirect()->back();
            }
        } catch (ThrottlingException $ex) {
            Session::flash('failed', __('auth.login_timeout'));

            return redirect()->back();

        } catch (NotActivatedException $ex) {
            Session::flash('failed', __('auth.login_unsuccessful_not_active'));

            return redirect()->back();
        }
    }

    public function postLogin(Request $request){

        Sentinel::authenticate($request->all());
        return Sentinel::check();
    }

    public function logout(){
        Sentinel::logout();
        return redirect('/login');
    }


    public function activate($userId, $code) {

        $user = Sentinel::findById($userId);

        if (Activation::complete($user, $code)) {

            // Activation was successfull
            Session::flash('success', __('auth.activate_successful'));

            return redirect()->route('admin.login');

        } else {

            Activation::removeExpired();
            // Activation not found or not completed.
            Session::flash('failed', __('auth.activate_unsuccessful'));

            return redirect()->route('admin.login');
        }
    }
}
