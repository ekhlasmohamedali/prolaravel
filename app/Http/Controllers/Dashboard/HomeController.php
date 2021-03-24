<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;

class HomeController extends DashboardController
{
    public function index()
    {
        return view('home');
    }
}
