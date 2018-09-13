<?php

namespace App\Http\Controllers;
use DB;
use App\Municipality;
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
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return view('front.myprofile')->with('municipal_list', $municipal_list);
    }

    function scholarship()
    {
        return view('front.scholarship');
    }

    function sdetails()
    {
        return view('front.sdetails');
    }
    
    function guardian()
    {
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return view('front.guardian')->with('municipal_list', $municipal_list);
    }
    
    function education()
    {
        return view('front.education');
    }

    function account()
    {
        return view('front.account');
    }


    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('munbar')
        ->where($select, $value)
        ->groupBy($dependent)
        ->get();
        $output = '<option value="" selected disabled>--Select--</option>';
        foreach($data as $row)
        {
        $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }
}
