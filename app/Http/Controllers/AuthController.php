<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterMail;
use App\Mail\ForgotPassword;
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
            if(!empty(Auth::user()->email_verified_at)){
                // return redirect("login")->with("success", "login sucess");
                echo "ok";
                die;
            }else{
                $user_id = Auth::user()->id;
                
                Auth::logout();
                
                $user = User::getSingle($user_id);
                $user->remember_token = Str::random(40);
                $user->save();
                Mail::to($user->email)->send(new RegisterMail($user));
                return redirect("login")->with("success", "please first you can varify your email");
            }
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
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);

        $user->remember_token = Str::random(40);

        $user->save();
        Mail::to($user->email)->send(new RegisterMail($user));

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
    function user_forgetController(Request $request){
        $user = User::where('email', "=", $request->email)->first();
        if(!empty($user)){
            $user->remember_token = Str::random(40);
            Mail::to($user->email)->send(new ForgotPassword($user));
            $user->save();
            return redirect("login")->with("success", "please check your email reset your password");
        }else{
            return redirect("login")->with("error", "email not found in our system");
        }
    }


    function user_reset($token){
        $user = User::where('remember_token', "=", $token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            return view('auth/reset', $data);
        }else{
            abort(404);
        }
    }
    function user_reset_save(request $request, $token){
        $user = User::where('remember_token', "=", $token)->first();
        if(!empty($user)){
            if($request->password == $request->cpassword){
                $user->remember_token = Str::random(40);
                if(empty($user->email_verified_at)){

                    $user->email_verified_at = date('Y-m-d H:i:s');
                }else{

                }
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect("login")->with("success", "password change");

            }else{
                return redirect()->back()->with("error", "password and confrim password did not match");
            }

            // $data['user'] = $user;
            // return view('auth/reset', $data);
        }else{
            abort(404);
        }
    }
}
