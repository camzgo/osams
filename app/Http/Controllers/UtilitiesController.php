<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DataTables;
use DB;

class UtilitiesController extends Controller
{
    //

    public function permission ()
    {
        return view ('admin.utilities.permission');
    }

    function getdata()
    {
        
        $permission = DB::table('account_type')->get();
        return DataTables::of($permission)
        ->addColumn('chk1', function($permission)
        {
            if($permission->file_maintenance == 'Grant')
            {
                return '<strong><i class="fa fa-check"></i> Grant</strong>';
            }
            else
            {
                return '<strong><i class="fa fa-close"></i> Deny</strong>';
            }
            
        })
        ->addColumn('chk2', function($permission)
        {
            if($permission->tracking == 'Grant')
            {
                return '<strong><i class="fa fa-check"></i> Grant</strong>';
            }
            else
            {
                return '<strong><i class="fa fa-close"></i> Deny</strong>';
            }
            
        })
        ->addColumn('chk3', function($permission)
        {
            if($permission->transactions == 'Grant')
            {
                return '<strong><i class="fa fa-check"></i> Grant</strong>';
            }
            else
            {
                return '<strong><i class="fa fa-close"></i> Deny</strong>';
            }
            
        })
        ->addColumn('chk4', function($permission)
        {
            if($permission->utilities == 'Grant')
            {
                return '<strong><i class="fa fa-check"></i> Grant</strong>';
            }
            else
            {
                return '<strong><i class="fa fa-close"></i> Deny</strong>';
            }
            
        })
        ->addColumn('chk5', function($permission)
        {
            if($permission->reports == 'Grant')
            {
                return '<strong><i class="fa fa-check"></i> Grant</strong>';
            }
            else
            {
                return '<strong><i class="fa fa-close"></i> Deny</strong>';
            }
            
        })
        ->addColumn('action', function($permission){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$permission->id.'"><i class="fa fa-edit"></i> </a>
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$permission->id.'"><i class="fa fa-trash"></i> </a> ';
        })
        ->rawColumns(['chk1', 'chk2', 'chk3', 'chk4', 'chk5', 'action'])
        ->make(true);

    }
}
