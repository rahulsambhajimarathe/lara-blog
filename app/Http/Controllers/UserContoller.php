<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserContoller extends Controller
{
    //
    function user() {
        $data['record'] = User::getRecordUser();
        return view('dackend\user\list', $data);
    }
}
