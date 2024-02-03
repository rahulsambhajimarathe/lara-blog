<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function adminpanel(){
        return view("dackend\dashboard");
    }
}
