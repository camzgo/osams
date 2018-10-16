<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use FPDF;
use Auth;
use DataTables;

class AuditController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return view('admin.utilities.audit')->with('role', $role);
    }

    function getdata()
    {
        $audit = DB::table('audit_log')->join('admins', 'admins.id', '=', 'audit_log.employee_id')->select(DB::raw("CONCAT_WS('', admins.surname,', ', admins.first_name, ' ', admins.middle_name, ' ', admins.suffix) as fullname"), "audit_log.action", DB::raw("DATE_FORMAT(audit_log.a_time, '%h:%i %p') as time"), DB::raw("DATE_FORMAT(audit_log.a_date, '%W, %d %M %Y') as date"), "audit_log.id")->orderBy('id', 'DESC');
        return DataTables::of($audit)
        ->addColumn('ccas', function($audit){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$audit->id.'"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$audit->id.'"><i class="fa fa-trash"></i> Delete</a> ';
        })
        ->make(true);

    }

    function search($date1, $date2)
    {
        $audit = DB::table('audit_log')->join('admins', 'admins.id', '=', 'audit_log.employee_id')->select(DB::raw("CONCAT_WS('', admins.surname,', ', admins.first_name, ' ', admins.middle_name, ' ', admins.suffix) as fullname"), "audit_log.action", DB::raw("DATE_FORMAT(audit_log.a_time, '%h:%i %p') as time"), DB::raw("DATE_FORMAT(audit_log.a_date, '%W, %d %M %Y') as date"), "audit_log.id")->whereBetween('a_date', [$date1, $date2])->orderBy('id', 'DESC');
        return DataTables::of($audit)
        ->addColumn('ccas', function($audit){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$audit->id.'"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$audit->id.'"><i class="fa fa-trash"></i> Delete</a> ';
        })
        ->make(true);
      // return $date2;
    }

     function print_audit($date1, $date2)
    {
        $audit = DB::table('audit_log')->join('admins', 'admins.id', '=', 'audit_log.employee_id')->select(DB::raw("CONCAT_WS('', admins.surname,', ', admins.first_name, ' ', admins.middle_name, ' ', admins.suffix) as fullname"), "audit_log.action", DB::raw("DATE_FORMAT(audit_log.a_time, '%h:%i %p') as time"), DB::raw("DATE_FORMAT(audit_log.a_date, '%W, %d %M %Y') as date"), "audit_log.id")->whereBetween('a_date', [$date1, $date2])->orderBy('id', 'DESC')->get();  
        $datas = $audit->toJson();
        $json = json_decode($datas, true);
        $ctr =  count($json);
        $ctr-=1;
        return view('admin.reports.audit_reports')->with('json', $json);
    }
     function print_all()
    {
        $audit = DB::table('audit_log')->join('admins', 'admins.id', '=', 'audit_log.employee_id')->select(DB::raw("CONCAT_WS('', admins.surname,', ', admins.first_name, ' ', admins.middle_name, ' ', admins.suffix) as fullname"), "audit_log.action", DB::raw("DATE_FORMAT(audit_log.a_time, '%h:%i %p') as time"), DB::raw("DATE_FORMAT(audit_log.a_date, '%W, %d %M %Y') as date"), "audit_log.id")->orderBy('id', 'DESC')->get();
        $datas = $audit->toJson();
        $json = json_decode($datas, true);
        $ctr =  count($json);
        $ctr-=1;
        return view('admin.reports.audit_reports2')->with('json', $json);

    }
}

