<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;

class SubController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show()
    {
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        return view('admin.submission.show')->with('role', $role);
    }
    
    function getdata()
    {
        
        $app = DB::table('application')->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('users', 'users.id', '=', 'application.applicant_id')
        ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'application.applicant_id', 
        'application.application_status', 'application.id', 'scholarships.scholarship_name', 'scholarships.id as scid')
        ->where('application.application_status', 'Pending')->get();
         return DataTables::of($app)

        ->addColumn('action', function($app){
                       
            return '<a href="submission/details/'.$app->scid.'" class="btn btn-sm btn-primary edit" id="'.$app->id.'"><i class="fa fa-eye"></i> View</a>';

        })
        ->make(true);

    }
    public function details()
    {
      ///  $scholarships = DB::table('scholarships')->where('id', $id)->first();
        echo 'scholarships';
    }
}
