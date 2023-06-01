<?php

namespace App\Http\Controllers;

use App\Models\Student;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:4",
            "email" => "required|email|unique:students,email",
            "password" => "required|min:8",
            "password_confirmation" => "same:password",
        ]);

        $verify_code = rand(100000,999999);
        //mailing step
        logger("Your verification code is ".$verify_code);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->verify_code = $verify_code;
        $student->user_token = md5($verify_code);
        //$student->user_token = $request->_token;
        $student->save();
        return redirect()->route('auth.login')->with("message","Registration Successful!");
    }

    public function login()
    {
        return view('auth.login');
    }

    public function check(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:students,email",
            "password" => "required|min:8"
        ],[
            "email.exists" => "email or password is wrong"
        ]);
        $student = Student::where("email",$request->email)->first();
        if(!Hash::check($request->password,$student->password)){
            return redirect()->route("auth.login")->withErrors(["email"=>"email or password is wrong"]);
        }
        session(["auth"=>$student]);
        return redirect()->route('dashboard.home');
    }

    public function logout()
    {
        session()->forget("auth");
        return redirect()->route('auth.login');
    }

    public function changePassword()
    {
        return view('auth.change-password');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            // "current_password" => "required|min:8|current_password",
            "current_password" => "required|min:8",
            "password" => "required|confirmed", //more precise than same
            // "password_confirmation" => "required|same:password"
        ]);

        //checking current password
        if(!Hash::check($request->current_password,session("auth")->password)){
                return redirect()->back()->withErrors(["current_password" => "current password is incorrect"]);
        }

        //new password update
        $student = Student::find(session('auth')->id);
        $student->password = Hash::make($request->password);
        $student->update();

        //clear auth session and login again
        session()->forget("auth");
        return redirect()->route("auth.login");
    }

    public function verifyEmail()
    {
        return view('auth.verify-email');
    }

    public function emailVerify(Request $request)
    {
        $request->validate([
            "verify_code" => "required"
        ]);

        if($request->verify_code != session('auth')->verify_code){
            return redirect()->back()->withErrors(["verify_code" => "Incorrect Verification Code"]);
        }

         $student = Student::find(session('auth')->id);
         $student->email_verified_at = now();
         $student->update();

         session(["auth" => $student]); //first auth during login check
         //session update after verified to store email_verified_date and so that we can check

        return redirect()->route('dashboard.home');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:students,email"
        ]);

        $student = Student::where("email",$request->email)->first();
        $link = route('auth.newResetPassword',["user_token"=>$student->user_token]);
        //mailing step
        logger("Your password reset link : ".$link);

        return redirect()->route('auth.login')->with("message","Password reset link has been send to your email.");
    }

    public function newResetPassword()
    {
        $user_token = request()->user_token;
        $student = Student::where("user_token",$user_token)->first();
        if(is_null($student)){
            return abort(403,"You are not allowed");
        }
        return view('auth.new-resetPassword',["user_token"=>$user_token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            "user_token" => "required|exists:students,user_token",
            "password" => "required|min:8|confirmed"
        ],[
            "user_token.exists" => "something wrong"
        ]);

        $student = Student::where("user_token",$request->user_token)->first();
        $student->password = Hash::make($request->password);
        $student->user_token = md5(rand(100000,999999));
        $student->update();

        session()->forget('auth');

        return redirect()->route("auth.login")->with("message","Password reset successful");

    }

}
