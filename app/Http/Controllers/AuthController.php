<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    function loginController(){
        return view("auth/login");
    }
    function user_loginController(request $request){
        $remember = !empty($request->remember) ? true : false;
        if( Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){

        }else{
            return redirect()->back()->with("error", "please enter your email address and password currectly");
        }
        return $_POST;
        // dd($request->all());
    }

    function registerController(){
        return view("auth/register");
    }
    function userregisterController(Request $request){

        request()->validate([
            'name'=> "required",
            'email'=>"required|email|unique:users",
            'password'=>"required",
        ]);
        $save = new User();
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);

        $save->remember_token = Str::random(40);

        $save->save();
        Mail::to($save->email)->send(new RegisterMail($save));

        return redirect("login")->with("success", "register successfully");

    }
    function verifyregisterController($token){
        $user = User::where('remember_token', '=', $token)->first();

        if (!empty($user)) {
            $user->email_verified_at = date("Y-m-d H:i:s");
            $user->remember_token = Str::random(40);
            $user->save();

            return redirect("login")->with("success", "Your account successfully verified");
        } else {
            abort(404);
        }
    }


    function forgetController(){
        return view("auth/forget");
    }
}
