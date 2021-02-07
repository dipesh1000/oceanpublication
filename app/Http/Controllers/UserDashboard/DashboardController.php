<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class DashboardController extends Controller
{
   
    public function index()
    {
        $users = Sentinel::getUser();
        return view('userdashboard.index', compact('users'));
    }

    public function myOrders()
    {
      

        $user = Sentinel::getUser();
        $users_order = Sentinel::getUserRepository()->setModel('App\User')->with('myOrder')->whereHas('myOrder')->findOrFail($user->id);
  
        return view('userdashboard.my-order.my-order',compact('users_order'));
    }
   
}
