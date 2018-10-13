<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Itexmo;
use DB;

class VerifyController extends Controller
{
    //

    public function getVerify()
    {

        if(Auth::check())
        {
            return view('verify');
        }
        
    }

    public function postVerify(Request $request)
    {
        $user = User::where('code', $request->code)->first();

        if ($user)
        {
            
            $user2 = DB::table('users')->where('code', $request->code)->update([
                'active'  => 0,
                'code'   => null
            ]);

            return redirect ('/');
        }
        else
        {
            return back()->withMessage('Verify code is not correct, Please try again.');
        }

        //     return redirect()->route('login')->withMessage('Your account is activated!');
        // }
        // else
        // {
        //     return back()->withMessage('Verify code is not correct, Please try again.');
        // }

        
    }

    public function genVerify()
    {
        $length=4;
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
      
        $code = $randomString;

        $user = DB::table('users')->where('id', Auth::user()->id)->update([
            'code' => $code
        ]);
        
        $res = Itexmo::to('0'.Auth::user()->mobile_number)->message('Your activation code: '.$code)->send();

        return redirect('/verify');
    }
}
