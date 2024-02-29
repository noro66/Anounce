<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppropriaterController extends Controller
{
    public function profilePage()
    {
        return view('appropriater.profile');
    }
}
