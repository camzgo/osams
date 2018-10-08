<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use DataTables;
use Validator;
use DB;
use Auth;


class UsersArchiveController extends Controller
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
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        return view ('admin.archive.users.show')->with('role', $role);
    }


    function getdata()
    {
        $admins = DB::table('admins')
        ->join('account_type', 'account_type.id', '=', 'admins.account_id')
        ->select("admins.id","admins.email", "account_type.account_name",
        DB::raw("CONCAT_WS('', admins.surname,', ', admins.first_name, ' ', admins.middle_name, ' ', admins.suffix) as fullname"))->where('user_isdel', '1')->get();
        return DataTables::of($admins)
        ->addColumn('action', function($admins){
            return '<a href="#" class="btn btn-sm btn-success edit" id="'.$admins->id.'"><i class="fa fa-refresh"></i> Restore </a>
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$admins->id.'"><i class="fa fa-trash"></i> Delete</a>';
        })
        // ->addColumn('checkbox', '<input type="checkbox" name="form_checkbox[]" class="form_checkbox" value="{{$id}}"/>')
        // ->rawColumns(['checkbox', 'action'])
        ->make(true);

    }
    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $admin = Admin::find($id);
        $output = array(
            'email'    =>  $admin->email,
            'surname'     =>  $admin->surname,
            'faq_isdel' => $admin->user_isdel
        );
        echo json_encode($output);
        //eval ($goback);
    }

    function postdata(Request $request)
    {
        
        $error_array = array();
        $success_output = '';
        $def = 0;
        $refresh = "return redirect('/archive/employee');";
        if($request->get('button_action') == 'update')
        {
            $admin = Admin::find($request->get('faq_id'));
            // $faquestion->question = $request->get('del_question');
            // $faquestion->answer = $request->get('del_answer');
            $admin->user_isdel = $request->get('faq_isdel');
            $admin->save();

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $audit = DB::table('audit_log')->insert([
                'date' => date('Y-m-d'),
                'time' => $time,
                'action' => 'Users Restored',
                'employee_id' => Auth::user()->id
            ]);

            $success_output = '';

        }
        else if($request->get('button_action') == 'delete')
        {
            $admin = Admin::find($request->get('faq_id'));
            // $admin->question = $request->get('question');
            // $admin->answer = $request->get('answer');
            $admin->user_isdel = $request->get('faq_isdel');

            $admin->save();
            $success_output = '';

        }
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
        //eval ($goback);
    }
        
    function removedata(Request $request)
    {
        $admin = Admin::find($request->input('id'));
        if($admin->delete())
        {

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $audit = DB::table('audit_log')->insert([
                'date' => date('Y-m-d'),
                'time' => $time,
                'action' => 'Users Deleted',
                'employee_id' => Auth::user()->id
            ]);

            echo 'It was successfully deleted!';
        }
    }
}
