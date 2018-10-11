<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use DataTables;
use App\Grades;

class GradesArchiveController extends Controller
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
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
         return view ('admin.archive.grades.show')->with('role', $role);
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
        $grades = DB::table('grades')->JOIN('users', 'users.id', '=', 'grades.student_id')
        ->select("grades.semester", "grades.student_id", "grades.grades_isdel", "grades.created_at",
        DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"))->where('grades_isdel', '1')->groupBy('grades.student_id')->get();
        return DataTables::of($grades)
        ->addColumn('action', function($grades){
            return '<a href="#" class="btn btn-sm btn-success edit" id="'.$grades->student_id.'"><i class="fa fa-refresh"></i> Restore</a>
                <a href="#" class="btn btn-sm btn-danger delete " id="'.$grades->student_id.'"><i class="fa fa-trash"></i> Delete</a>';
        })
        ->make(true);

    }

   function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $grades = DB::table('grades')->where('student_id', $id)->get();
        $nos = DB::table('grades')->where('student_id', $id)->count();
        $noss = DB::table('grades')->where('student_id', $id)->first();
        
        $grad = array();
        $sub = array();
        

        foreach($grades as $graad)
        {
            array_push($grad, $graad->grades);
            array_push($sub, $graad->subject);
        }
        
        $output = array(
            'grades'     =>  $grad,
            'subject'   =>  $sub,
            'created'  => $noss->created_at
        );
        echo json_encode($output);
    
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
                $grades = DB::table('grades')->where('student_id', $request->get('a_id'))->update([
                    'grades_isdel' => 0,
                    'new'  => 0
                ]);
                // $faquestion->answer = $request->get('answer');
                // $faquestion->faq_isdel = $request->get('faq_isdel');
                $success_output = '';
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                'date' => date('Y-m-d'),
                'time' => $time,
                'action' => 'Grades Restored',
                'employee_id' => Auth::user()->id
                ]);

            }
            else if($request->get('button_action') == 'delete')
            {
                
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
        $grad = DB::table('grades')->where('student_id', $request->get('del'))->where('created_at', $request->created_at)->get();
        $del = array();
        foreach($grad as $grad2)
        {
            array_push($del, $grad2->id);
        }
        $sum = count($del);

        for($x=0; $x<=$sum-1;$x++)
        {
            $affected = DB::table('grades')->delete($del[$x]);
            return redirect('/'.$del[$x]);
        }

        
        // date_default_timezone_set("Asia/Manila");
        // $time = date('h:i:s', strtotime(now()));
        // $audit = DB::table('audit_log')->insert([
        // 'date' => date('Y-m-d'),
        // 'time' => $time,
        // 'action' => 'Grades Deleted',
        // 'employee_id' => Auth::user()->id
        // ]);
       //echo 'It was successfully deleted!';
    }

}
