<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\File;


class DashboardController extends Controller
{
    public function index()
    {
        $users = Sentinel::getUser();
        return view('userdashboard.index', compact('users'));
    }
   
}
