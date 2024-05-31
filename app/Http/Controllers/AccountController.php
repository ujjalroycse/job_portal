<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function acountRegistration(){
        return view('frontend.account.registration');
    }

    //User Registration and Validation
    public function userRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);
        
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('account/login');
    }

    public function accountLogin(){
        if(Auth::check()){
           return redirect('/');
        }
        return view('frontend.account.login');
    }

    //User Login
    public function userLogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password ])){
           return redirect('account/profile');
        }
        else{
            return back()->with('error', 'User name or password is wrong!!');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('account/login');
    }

    public function profile(){
        $id = Auth::user()->id;
        $user = user::where('id',$id)->first();
        return view('frontend.account.profile', [
            'user' => $user
        ]);
    }

    //Update Profile
    public function userUpdate(Request $request,$id){
        // dd($request->all());
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'nullable',
            'mobile' => ['nullable','size:11','unique:users,mobile,' . $id],
            // 'password' => 'required|confirmed|min:6'
        ]);
        user::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'designation' => $request->designation,
            'mobile' => $request->mobile,
        ]);
        return back()->with('success', 'Update successfull');
    }
}
