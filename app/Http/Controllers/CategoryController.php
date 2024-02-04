<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    
    function category() {
        $data['record'] = Category::getRecordUser();
        return view('dackend\category\list', $data);
    }
}
