<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserContoller extends Controller
{
    //
    function user() {
        $data['record'] = User::getRecordUser();
        return view('dackend\user\list', $data);
    }
    function add_user(Request $request){
        return view('dackend\user\add');
    }
    function add_user_create(Request $request){
        
        $save = new User;
        $save->name =trim($request->name);
        $save->email =trim($request->email);
        $save->password =Hash::make($request->password);
        $save->status =trim($request->staus);
        $save->save();
        return redirect('panel/user/list/')->with('success', "User Successfull Created");
    }
    function edit_user($id){
        $data['record'] = User::getSingle($id);
        return view('dackend\user\edit', $data);
    }
    function update_user($id, Request $request){

        $save = User::getSingle($id);
        $save->name =trim($request->name);
        $save->email =trim($request->email);
        if(!empty($request->password)){

            $save->password =Hash::make($request->password);
        }
        $save->status =trim($request->status);
        $save->save();
        return redirect('panel/user/list/')->with('success', "User Successfull update");
    }

    function delete_user($id){
        $save = User::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', "User successfully deleted");
    }
}