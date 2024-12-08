<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Room;
use App\Models\BookRoom;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Mail\admin\ForgotPasswordMail;
use Mail;


class AdminController extends Controller
{   
    public function dashboard(){
        $data = Student::all();
        $total_room = Room::all();
        $booked_room = BookRoom::all();
        return view('admin.dashboard', compact('data', 'total_room','booked_room'));
       
        
    }

    public function login(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('Admin_Dashboard');
            
        }
        return view('Admin_Login'); 
        
        
    }

    public function admin_login_submit(Request $req){
        $req->validate([
          'email' => 'required|email',
          'password' => 'required'
        ]);
        $credentials = $req->only('email','password');
        if(Auth::guard('admin')->attempt($credentials)){
            $admin = Admin::where('email',$req->input('email'))->first();
            Auth::guard('admin')->login($admin);
            return redirect()->route('Admin_Dashboard');    
        }else{
            return redirect()->route('Admin_Login')->with('error', 'Sorry, email or password does not match');
        }
    }

    public function logout(){ 
        Auth::guard('admin')->logout();
        return redirect()->route('Admin_Login')->with('success',"logout successfull");

       
    }

   // Forgot Password
    public function forgot_password(){
        return view('forgot_password.admin.forgot_password');
    }

    public function forgot_password_submit(Request $req){
        $user = Admin::getEmailSingle($req->email);
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return  redirect()->back()->with('success', 'Please check your email and reset your password');
        }else{
           return  redirect()->back()->with('error', 'Email not found!');
        }
    }

    public function reset($remember_token){
        $user = Admin::getTokenSingle($remember_token);
        if(!empty($user)){
            $data['user'] = $user;
            return view('forgot_password.admin.reset_password', $data);

        }else{
            abort(404);
        }
    }

    public function reset_password($token, Request $req){
        if($req->password == $req->confirm_password){
            $user = Admin::getTokenSingle($token);
            $user->password = Hash::make($req->password);
            $user->remember_token = Str::random(30);
            $user->save();
            return  redirect()->route('Admin_Login')->with('success', 'Password reset successfully !!');
            
        }else{
            return  redirect()->back()->with('error', 'Sorry, password and confirm password does not match !!');

        }
       
    }

    // change Passwrod
    public function change_password(){
        return view('change_password.change_admin_pass');
     
    }

    public function update_password(Request $req){
        $req->validate([
            'old_password'=>'required|min:6|max:50',
            'new_password'=>'required|min:6|max:50',
            'confirm_password'=>'required|same:new_password'
        ]);
        $user = Auth::guard('admin')->user();
        if(!Hash::check($req->old_password, $user->password)){
            
            return redirect()->back()->with('error','Current password does not match with old password');
        }

             $password = Hash::make($req->new_password);
             $user->password = $password;
             $user->save();
             return redirect()->back()->with('success','password Updated Successfully');

       

    }

    public function viewProfile(){
        $data = Admin::all();
        return view('admin.adminprofile', compact('data'));
    }


    
}
