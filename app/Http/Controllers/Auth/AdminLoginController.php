<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class AdminLoginController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view ('auth.admin-login');
    }

    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]); 

        

        //attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('admin.dashboard'));
        }

       
    
        //if unsuccesfull, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'))->with("error", "Wrong Credentials!");
    }
    
    public function logout()
    {
        
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
        
    }

    
}
