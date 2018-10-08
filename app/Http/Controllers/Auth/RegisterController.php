<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\Captcha;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'surname' => 'required|string|regex:/^[a-zA-Z]+$/u|max:50',  
            'first_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:50',
            'middle_name' => 'nullable|regex:/^[a-zA-Z]+$/u|max:50',
            'suffix' => 'nullable|regex:/^[a-zA-Z]+$/u|max:50',
            'gender' => 'required|string|max:10',
            'bday' =>'required',
            'mobile_no' =>'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => new Captcha(),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['gender'] == 'Male')
        {
            $none ='male.png';
        }
        else
        {
            $none = 'female.png';
        }

        $var = $data['bday'];
        $date = str_replace('/', '-', $var);
        $dta = date('Y-m-d', strtotime($date));

        return User::create([
            'surname' => ucfirst($data['surname']),
            'first_name' => ucfirst($data['first_name']),
            'middle_name'=> ucfirst($data['middle_name']),
            'suffix' => ucfirst($data['suffix']),
            'gender'=>$data['gender'],
            'bday'=> $dta,
            'applicant_isdel' => 0,
            'mobile_number' => $data['mobile_no'],
            'profile_photo' => $none,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'school_id' => $data['school_id'],
            'new'  => 1,
            'chg' => 0,
             
        ]);
    }
}
