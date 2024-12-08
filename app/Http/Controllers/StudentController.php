<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Mail\user\ForgotPasswordMail;
use Mail;

class StudentController extends Controller
{   
    // load student dashboard
    public function dashboard(){
        return view('student.dashboard');
    }
    
    // load login page
    public function login(){
        if(Auth::guard('student')->check()){
            return redirect()->route('Student_Dashboard');   
        }
        return view('Student_Login');
    }
    
    // load register page
    public function register(){
        return view('student_register');
    }

    // load admin student register page
    public function addstudent(){
        return view('admin.addstudent');
    }

    // insert/store student data into the database
    public function student_register_sumbit(Request $req){
        $req->validate([
           'name' => 'required',
           'address' => 'required',
           'dob' => 'required',
           'gender' => 'required',
           'email' => 'required|email|unique:students',
           'contact' => 'required',
           'image' => 'required',
           'gname' => 'required',
           'grelation' => 'required',
           'gphone' => 'required',
           'password' => 'required|min:6',
           'confirm_password' => 'required',
        ]);
       //store image 
        $imageName = time().'.'.$req->image->extension();  
        $req->image->move(public_path('images'), $imageName);
        $data=new Student();
        $data->name = $req->name;
        $data->address = $req->address;
        $data->dob = $req->dob;
        $data->gender = $req->gender;
        $data->email = $req->email;
        $data->contact_no = $req->contact;
        $data->image = 'images/'.$imageName;
        $data->gname = $req->gname;
        $data->grelation = $req->grelation;
        $data->gcontact_no = $req->gphone;
        $data->password = Hash::make($req->password);
        $data->confirm_password = Hash::make($req->confirm_password);
        $result=$data->save();
        if($result){
            if(Auth::guard('admin')->check()){
                return redirect()->route('managestudent');   
            }
            return redirect()->route('Student_Login')->with('success','Student Register successfully!');
        }else{
            return redirect()->back()->with('error','Sorry, data is not added!');
        }

    }
        


    // student login submit
    public function student_login_submit(Request $req){
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $req->only('email','password');
        if(Auth::guard('student')->attempt($credentials)){
            $student = Student::where('email',$req->input('email'))->first();
            Auth::guard('student')->login($student);
            return redirect()->route('Student_Dashboard')->with('success','Login Successfull!!');
        }else{
            return redirect()->route('Student_Login')->with('error', 'Sorry, email or password does not match');
        }
       
    }

    // logout 
    public function logout(){
        Auth::guard('student')->logout();
        return redirect()->route('Student_Login')->with('success',"logout successfull");
        
    }

    // Forgot Password
    public function forgot_password(){
        return view('forgot_password.user.forgot_password');
    }

    public function forgot_password_submit(Request $req){
        $user = Student::getEmailSingle($req->email);
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return  redirect()->back()->with('success', 'Please check your email and reset your password');
        }else{
           return  redirect()->back()->with('error', 'Sorry, email not found!');
        }
    }
    
    // reset password
    public function reset($remember_token){
        $user = Student::getTokenSingle($remember_token);
        if(!empty($user)){
            $data['user'] = $user;
            return view('forgot_password.user.reset_password', $data);

        }else{
            abort(404);
        }
    }

    public function reset_password($token, Request $req){
        if($req->password == $req->confirm_password){
            $user = Student::getTokenSingle($token);
            $user->password = Hash::make($req->password);
            $user->remember_token = Str::random(30);
            $user->save();
            return  redirect()->route('Student_Login')->with('success', 'Password reset successfully !!');
            
        }else{
            return  redirect()->back()->with('error', 'Password and Confirm Password does not match !!');

        }
       
    }

    // Change Password
    public function student_change_password(){
        return view('change_password.change_student_pass');
    }

    public function student_update_password(Request $req){
        $req->validate([
            'old_password'=>'required|min:6|max:50',
            'new_password'=>'required|min:6|max:50',
            'confirm_password'=>'required|same:new_password'
        ]);
        $user = Auth::guard('student')->user();
        if(!Hash::check($req->old_password, $user->password)){
            
            return redirect()->back()->with('error','Current password does not match with old password');
        }

             $password = Hash::make($req->new_password);
             $user->password = $password;
             $user->save();
             return redirect()->back()->with('success','password Updated Successfully');

    }

    //view all details about the student registration
    public function managestudent(){
        $data=Student::all();
        return view('admin.managestudent', compact('data'));
    }

    // edit data
    public function editstudent($id){
        $data = Student::find($id);
        return view("admin.editstudent", compact('data'));
    }
    
    # Function to update student data
    public function updatestudent($id, Request $req)
    {
        // Valildation
        $req->validate([
            'name' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'gname' => 'required',
            'grelation' => 'required',
            'gphone' => 'required',
         ]);

        // Update the record
        $data = Student::find($id);
        $data->name = $req->name;
        $data->address = $req->address;
        $data->dob = $req->dob;
        $data->gender = $req->gender;
        $data->contact_no = $req->contact;
        $data->gname = $req->gname;
        $data->grelation = $req->grelation;
        $data->gcontact_no = $req->gphone;
        $result=$data->save();
        if($result){
            return redirect()->route('managestudent')->with('success','Student updated successfully!');
        }else{
            return redirect()->back()->with('error','Sorry, data is not updated!');
        }
    }

    public function viewProfile(){
        $id = Auth::guard('student')->user()->id;
        $data = Student::where('id', $id)->get();
        return view('student.studentprofile', compact('data'));
    }
}
