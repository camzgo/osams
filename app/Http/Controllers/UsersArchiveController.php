<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use DataTables;
use Validator;
use DB;


class UsersArchiveController extends Controller
{
    //

    public function index()
    {
        //
        return view ('admin.archive.users.show');
    }


    function getdata()
    {
        $admins = Admin::select("id","email",
        DB::raw("CONCAT(admins.surname,', ',admins.first_name, ' ', admins.middle_name, ' ', admins.suffix) as fullname"))->where('user_isdel', '1')->get();
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
            echo 'It was successfully deleted!';
        }
    }
}
