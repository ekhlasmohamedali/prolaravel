<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Receptionist;


class ReceptionistController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.receptionists.index');
    }

    public function create()
    {
        return view('dashboard.receptionists.create');
    }


}
