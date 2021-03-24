<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Receptionist;


class ReceptionistController extends Controller
{
    public function index(Request $request)
    {

        $count = Receptionist::count();
        $receptionists = Receptionist::all();
       
     
        return view('dashboard.receptionists.index', compact('receptionists', 'count'));
    }


}
