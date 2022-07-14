<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccommodationsController extends Controller
{
    public function dashboardView(Request $request){
        return view('app.dashboard');
    }

    public function createAccomodationView(Request $request){
        return view('app.accommodations.create-new');
    }
}
