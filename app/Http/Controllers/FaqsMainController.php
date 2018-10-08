<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Faquestion;
use DataTables;
use DB;
use Auth;

class FaqsMainController extends Controller
{
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

        return view('admin.file_maintenance.faqs.show')->with('role', $role);
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
        $faquestions = Faquestion::select('id','question', 'answer')->where('faq_isdel', '0')->get();
        return DataTables::of($faquestions)
        ->addColumn('action', function($faquestions){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$faquestions->id.'"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$faquestions->id.'"><i class="fa fa-trash"></i> Delete</a> ';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="form_checkbox[]" class="form_checkbox" value="{{$id}}"/>')
        ->rawColumns(['checkbox', 'action'])
        ->make(true);

    }
    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $faquestion = Faquestion::find($id);
        $output = array(
            'question'    =>  $faquestion->question,
            'answer'     =>  $faquestion->answer,
            'faq_isdel' => $faquestion->faq_isdel
        );
        echo json_encode($output);
        //eval ($goback); 
    }

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'question' => 'required',
            'answer'  => 'required',
        ]);
        
        $error_array = array();
        $success_output = '';
        $def = 0;
        $refresh = "return redirect('/faqs');";
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == 'insert')
            {
                $faquestion = new Faquestion([
                    'question'    =>  $request->get('question'),
                    'answer'     =>  $request->get('answer'),
                    'faq_isdel' => $def
                ]);
                $faquestion->save();
                $success_output = '';

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                'date' => date('Y-m-d'),
                'time' => $time,
                'action' => 'FAQs Added new data',
                'employee_id' => Auth::user()->id
                ]);
            }

            else if($request->get('button_action') == 'update')
            {
                $faquestion = Faquestion::find($request->get('faq_id'));
                $faquestion->question = $request->get('question');
                $faquestion->answer = $request->get('answer');
                $faquestion->save();
                $success_output = '';

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                'date' => date('Y-m-d'),
                'time' => $time,
                'action' => 'FAQs Updated new data',
                'employee_id' => Auth::user()->id
                ]);

            }
            else if($request->get('button_action') == 'delete')
            {
                $faquestion = Faquestion::find($request->get('faq_id'));
                $faquestion->question = $request->get('question');
                $faquestion->answer = $request->get('answer');
                $faquestion->faq_isdel = $request->get('faq_isdel');

                $faquestion->save();
                $success_output = '';

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                'date' => date('Y-m-d'),
                'time' => $time,
                'action' => 'FAQs Deleted new data',
                'employee_id' => Auth::user()->id
                ]);

            }
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
        $faquestion = Faquestion::find($request->input('id'));
        $faquestion->faq_isdel = 1;
        $faquestion->save();
        
    }

    function massremove(Request $request)
    {
        $student_id_array = $request->input('id');
        $student = Student::whereIn('id', $student_id_array);
        if($student->delete())
        {
            echo 'Data Deleted';
        }
    }
}
