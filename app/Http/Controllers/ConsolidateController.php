<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use Auth;

class ConsolidateController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return view('admin.transaction.consolo')->with('role', $role);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }


    function getdata()
    {
        $consolo = DB::table('application')->where('application_status', 'Re-checked')->join('users' , 'users.id', '=', 'application.applicant_id')
        ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'application.barcode_number', 'application.id as app_id', 'users.id as users_id', 'users.school_id')->get();
        return DataTables::of($consolo)
        ->addColumn('action', function($consolo){
            return '<a href="/admin/apply/application/form/'.$consolo->users_id.'" target="_blank" class="btn btn-sm btn-primary print" ><i class="fa fa-print"></i> Print</a>
                    <a href="#" class="btn btn-sm btn-success edit" id="'.$consolo->app_id.'"><i class="fa fa-check"></i> Approved</a>
                    <a href="#" class="btn btn-sm btn-danger edit" id="'.$consolo->app_id.'"><i class="fa fa-close"></i> Disapproved</a>';
        })

        ->make(true);

    }
    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $consolo2 = DB::table('application')->where('application.id', $id)->join('users' , 'users.id', '=', 'application.applicant_id')
        ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'application.barcode_number', 'application.id as app_id', 'users.id as users_id', 'users.school_id', 'application.scholar_id')->first();
        $output = array(
            'users_id'    => $consolo2->users_id,
            'app_id'     =>  $consolo2->app_id,
            'scholar_id'  => $consolo2->scholar_id
            
        );
        echo json_encode($output);
        //eval ($goback); 
    }

    function postdata(Request $request)
    {
        $error_array = array();
        $success_output = '';
        $def = 0;

        if($request->get('conso') == 'Approved')
        {
            $conso = DB::table('application')->where('id', $request->get('app_id'))->update([
                'application_status' => 'Approved'
            ]);
            
            $success_output = '';

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $audit = DB::table('audit_log')->insert([
            'date' => date('Y-m-d'),
            'time' => $time,
            'action' => 'Application Approved',
            'employee_id' => Auth::user()->id
            ]);

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            
            $log = DB::table('log')->insert([
                'description' => 'Your application has been approved.',
                'scholar_id' => $request->get('sc_id'),
                'applicant_id' => $request->get('users_id'),
                'employee_id'  => Auth::user()->id,
                'remarks'    => $request->get('remarks'),
                'date' => date('Y-m-d'),
                'time' => $time
            ]);

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $history = DB::table('history_log')->insert([
                'action'  => 'Application Approved',
                'date'     => date('Y-m-d'),
                'time'     =>$time,
                'applicant_id' => $request->get('app_id'),
                'scholar_id' => $request->get('sc_id'),
            ]);
        }

        else if($request->get('conso') == 'Disapproved')
        {
           $conso = DB::table('application')->where('id', $request->get('app_id'))->update([
                'application_status' => 'Disapproved'
            ]);
            $success_output = '';

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $audit = DB::table('audit_log')->insert([
            'date' => date('Y-m-d'),
            'time' => $time,
            'action' => 'Application Disapproved',
            'employee_id' => Auth::user()->id
            ]);

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $history = DB::table('history_log')->insert([
                'action'  => 'Application Disapproved',
                'date'     => date('Y-m-d'),
                'time'     =>$time,
                'applicant_id' => $request->get('users_id'),
                'scholar_id' => $request->get('sc_id'),
            ]);

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            
            $log = DB::table('log')->insert([
                'description' => 'Your application has been disapproved.',
                'scholar_id' => $request->get('sc_id'),
                'applicant_id' => $request->get('users_id'),
                'employee_id'  => Auth::user()->id,
                'remarks'    => $request->get('remarks'),
                'date' => date('Y-m-d'),
                'time' => $time
            ]);

            
            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $history = DB::table('history_log')->insert([
                'action'  => 'Application Disapproved',
                'date'     => date('Y-m-d'),
                'time'     =>$time,
                'applicant_id' => $request->get('app_id'),
                'scholar_id' => $request->get('sc_id'),
            ]);

        }
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
        //eval ($goback);
    }

}
