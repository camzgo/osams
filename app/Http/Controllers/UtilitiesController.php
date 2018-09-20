<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DataTables;
use DB;
use App\AccountType;
use Auth;

class UtilitiesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function permission ()
    {
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        return view ('admin.utilities.permission')->with('role', $role);
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
        ->addColumn('chk6', function($permission)
        {
            if($permission->submission == 'Grant')
            {
                return '<strong><i class="fa fa-check"></i> Grant</strong>';
            }
            else
            {
                return '<strong><i class="fa fa-close"></i> Deny</strong>';
            }
            
        })
        ->addColumn('action', function($permission){
            if($permission->account_name == "Admin" || $permission->account_name == "ADMIN" || $permission->account_name == "ADMINISTRATOR" || $permission->account_name == "Administrator" )
            {
                return '';
            }
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$permission->id.'"><i class="fa fa-edit"></i> </a>
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$permission->id.'"><i class="fa fa-trash"></i> </a> ';
        })
        ->rawColumns(['chk1', 'chk2', 'chk3', 'chk4', 'chk5', 'chk6', 'action'])
        ->make(true);

    }
    function fetchdata(Request $request)
    {
        $id = $request->input('id');
      //  $permission = DB::table('account_type')->where('id', $id)->first();
        $permissions = AccountType::find($id);
        $output = array(
            'account_name'    =>  $permissions->account_name,
            'account_desc'     =>  $permissions->account_desc,
            'file_maintenance' => $permissions->file_maintenance,
            'tracking'         => $permissions->tracking,
            'transactions'     => $permissions->transactions,
            'utilities'        => $permissions->utilities,
            'reports'          => $permissions->reports,
            'submission'       => $permissions->submission
        );
        echo json_encode($output);
    }

    function postdata(Request $request)
    {
        // $validation = Validator::make($request->all(), [
        //     'accnt_name' => 'required',
        //     'accnt_desc'  => 'required',
        // ]);
        
        $error_array = array();
        $success_output = '';
        $def = 0;
        // if ($validation->fails())
        // {
        //     foreach ($validation->messages()->getMessages() as $field_name => $messages)
        //     {
        //         $error_array[] = $messages;
        //     }
        // }


            $str = $request->get('tx_fm');
            $act = (explode("/",$str));

            if($request->get('button_action') == 'insert')
            {
                $account = new AccountType([
                    'account_name'    =>  $request->get('accnt_name'),
                    'account_desc'     =>  $request->get('accnt_desc'),
                    'file_maintenance'  =>  $act[0],
                    'tracking'         => $act[1],
                    'transactions'     => $act[2],
                    'utilities'        => $act[3],
                    'reports'          => $act[4],
                    'submission'       => $act[5]
                    //   'account_desc'     =>  $request->get('accnt_desc'),
                    //    'account_desc'     =>  $request->get('accnt_desc'),
                    //     'account_desc'     =>  $request->get('accnt_desc'),
                    //      'account_desc'     =>  $request->get('accnt_desc'),
                    // 'faq_isdel' => $def
                ]);
                $account->save();
                $success_output = '';
            }

            else if($request->get('button_action') == 'update')
            {
                $account = AccountType::find($request->get('accnt_id'));
                $account->account_name    =  $request->get('accnt_name');
                $account->account_desc     =  $request->get('accnt_desc');
                $account->file_maintenance  =  $act[0];
                $account->tracking         = $act[1];
                $account->transactions    =  $act[2];
                $account->utilities        = $act[3];
                $account->reports          = $act[4];
                $account->submission       = $act[5];
                $account->save();
                $success_output = '';

            }
        
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    function removedata(Request $request)
    {
        $account = AccountType::find($request->input('id'));
        if($account->delete())
        {
            echo 'It was successfully deleted!';
        }
    }
}
