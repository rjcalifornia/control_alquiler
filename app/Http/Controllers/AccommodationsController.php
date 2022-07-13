<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function dashboardView(Request $request){
        return view('app.dashboard');
    }
}
