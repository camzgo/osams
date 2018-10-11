<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        $audit = DB::table('audit_log')->orderByRaw('id', 'ASC');
        return DataTables::of($audit)
        ->addColumn('ccas', function($audit){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$audit->id.'"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$audit->id.'"><i class="fa fa-trash"></i> Delete</a> ';
        })
        ->make(true);

    }
}
