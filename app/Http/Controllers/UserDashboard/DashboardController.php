<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $users = Sentinel::getUser();
        return view('userdashboard.index', compact('users'));
    }
    public function singleProfile()
    {
        $users = Sentinel::getUser();
        return view('userdashboard.profile', compact('users'));
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'email' => 'required|email',
            'new_password' => 'required',
            'password_confirmation' => 'same:new_password',
        ]);
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->new_password);
        if ($request->hasFile('image')){
            imageDelete($user);
            $user->image = imageupload('/upload/profile/image/', $request->file('image'));
        }
        $user->update();
        return redirect('/profile')->with('success', 'Data is successfully updated');
    }
}
