<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class VerifyController extends Controller
{
    //

    public function getVerify()
    {
        return view('verify');
    }

    public function postVerify()
    {

        if ($user = User::where('code', $request->code)->first())
        {
            $user->active=1;
            $user->code =null;
            $user->save();
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
    }
}
