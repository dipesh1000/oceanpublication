<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ResponseAPI;

class StudentController extends Controller
{
    //
    use ResponseAPI;

    public function studentProfile(Request $request)
    {
        
        $user = User::find(Auth::id());
        if($user->roles->isNotEmpty())
        {
          
            if($user->roles[0]['name']=="student")
            {
                return $this->success("User Retrieved",$user,) ;
            }
        }
        else
        {
         
            return $this->error("User is not student");
        }
       
        
    }

 
}
