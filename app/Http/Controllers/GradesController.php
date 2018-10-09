<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use DataTables;

class GradesController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
         return view ('admin.file_maintenance.grades.show')->with('role', $role);
    }

     function getdata()
    {   
        $grades = DB::table('grades')->JOIN('users', 'users.id', '=', 'grades.student_id')
        ->select("grades.semester", "grades.student_id", "grades.grades_isdel",
        DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"))->where('grades_isdel', '0')->groupBy('grades.student_id')->get();
        return DataTables::of($grades)
        ->addColumn('action', function($grades){
            return '<a href="#" class="btn btn-sm btn-success view" id="'.$grades->student_id.'"><i class="fa fa-eye"></i> View</a> 
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$grades->student_id.'"><i class="fa fa-trash"></i> Delete</a> ';
        })
        ->make(true);

    }
    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $grades = DB::table('grades')->where('student_id', $id)->get();
        $nos = DB::table('grades')->where('student_id', $id)->count();
        $grad = array();
        $sub = array();
        

        foreach($grades as $graad)
        {
            array_push($grad, $graad->grades);
            array_push($sub, $graad->subject);
        }
        
        $output = array(
            'grades'     =>  $grad,
            'subject'   =>  $sub
        );
        echo json_encode($output);
        
        

        // $output = array(
        //     'surname'    =>  $user->surname,
        //     'first_name'     =>  $user->first_name,
        //     'applicant_isdel' => $user->applicant_isdel,
        //     'nationality'   => $personal->nationality,
        //     'religion'     => $personal->religion,
        //     'civil_status' => $personal->civil_status,
        //     'birth_place' => $personal->birth_place,
        //     'gender'     => $user->gender,
        //     'bday'       => $user->bday,
        //     'mobile_number' => $user->mobile_number,
        //     'fullname'   => $user->first_name.' '.$user->middle_name.' '.$user->surname.' '.$user->suffix,
        //     'address'    =>$personal->street.' '.$personal->barangay.', '.$personal->municipality

        // );
       // echo json_encode($output);
        //eval ($goback);
    }
    function postdata(Request $request)
    {
        // $validation = Validator::make($request->all(), [
        //     'question' => 'required',
        //     'answer'  => 'required',
        // ]);
        
        $error_array = array();
        $success_output = '';
        $def = 0;
        $refresh = "return redirect('/faqs');";
        // if ($validation->fails())
        // {
        //     foreach ($validation->messages()->getMessages() as $field_name => $messages)
        //     {
        //         $error_array[] = $messages;
        //     }
        // }
        // else
        // {
            if($request->get('button_action') == 'update')
            {
                // $faquestion = Faquestion::find($request->get('faq_id'));
                // $faquestion->question = $request->get('question');
                // $faquestion->answer = $request->get('answer');
                // $faquestion->save();
                // $success_output = '';

            }
            else if($request->get('button_action') == 'delete')
            {
                $grades = DB::table('grades')->where('student_id', $request->get('del_id'))->update([
                    'grades_isdel' => 1,
                    'new'  => 1
                ]);
                $success_output = '';

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                'date' => date('Y-m-d'),
                'time' => $time,
                'action' => 'Grades Archived',
                'employee_id' => Auth::user()->id
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
