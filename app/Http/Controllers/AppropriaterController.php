<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppropriaterController extends Controller
{
    public function profilePage()
    {
        return view('appropriater.profile');
    }

    public function appropriaterDashboard()
    {
        $announces = Auth::user()->announces;
//        dd($announces);
        return view('admin.dashboard', compact('announces'));
    }
}
