<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function fronte()
    {
        return view ('sas');
    }
    function faq()
    {
        $faq = DB::table('faquestions')->get();
        return view('faq2')->with('faq', $faq);
    }
    function about()
    {
        return view('about-us');
    }

    function contact()
    {
        return view('contact');
    }
    function profile()
    {
        return view('front.profile');
    }
    function myProfile()
    {
        return view('front.myprofile');
    }

    function scholarship()
    {
        return view('front.scholarship');
    }

    function sdetails()
    {
        return view('front.sdetails');
    }
}
