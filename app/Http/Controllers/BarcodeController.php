<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BarcodeController extends Controller
{
    //
    public function barcode()
{
    return view('sample');
}

public function fronte()
{

    $faq = DB::table('faquestions')->get();
    return view('faq')->with('faq', $faq);
}
}
