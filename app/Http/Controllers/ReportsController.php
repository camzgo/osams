<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use FPDF;
use Session;

class ReportsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        // $applicants = DB::table('application')->join('users', 'users.id', '=', 'application.applicant_id')->select('users.first_name')->get();
        // $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        // ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        // 'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        // return view('admin.reports.master')->with('role', $role)->with('applicants', $applicants);
        $sampler = 'HI, GOD BLESS YOU BRO!';
        $sample= Session::get('data');
         return view ('admin.reports.repo')->with('sample', $sample);
       // include(app_path() . '\repo.php');
    }
}
