<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Scholarship;
use DataTables;

class TrackingController extends Controller
{
    //
    function viewTrack()
    {
        return view('admin.tracking.show');
    }



     function getdata()
    {
        $scholarships = Scholarship::select('id','scholarship_name', 'scholarship_desc', 'amount', 'deadline', 'slot', 'status')->where('status', 'CLOSED');
        return DataTables::of($scholarships)

        ->addColumn('action', function($scholarships){
                       
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$scholarships->id.'"><i class="fa fa-edit"></i> Update</a>';
                
            
        })
        ->addColumn('badge', function($scholarships){
            // return '<button class="btn btn-primary" >'.$scholarships->status.'</button>';
            if($scholarships->status=="OPEN")
            {
                return '<h4><span class="badge badge-success">'.$scholarships->status.'</span></h4>';
            }
            else
            {
                return '<h4><span class="badge badge-danger">'.$scholarships->status.'</span></h4>';
            }
            
        })
        
        // ->addColumn('checkbox', '<input type="checkbox" name="student_checkbox[]" class="student_checkbox" value="{{$id}}"/>')
        // ->rawColumns(['checkbox', 'action'])
        ->rawColumns(['badge', 'action'])
        ->make(true);

    }
    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $scholarship = Scholarship::find($id);
        $output = array(
            'scholarship_name'    =>  $scholarship->scholarship_name,
            'scholarship_desc'     =>  $scholarship->scholarship_desc,
            'amount'              =>   $scholarship->amount,
            'deadline'             => $scholarship->deadline,
            'slot'                => $scholarship->slot,
            'status'               =>$scholarship->status
        );
        echo json_encode($output);
        //eval ($goback);
    }

    function postdata(Request $request)
    {
        
    //     protected $rules =
    // [
    //     'title' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
    //     'content' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'
    // ];

        $error_array = array();
        $success_output = '';
        $refresh = "return redirect('/scholarship');";
        
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {

            if($request->get('button_action') == 'update')
            {
                $scholarship = Scholarship::find($request->get('scholarship_id'));
                $scholarship->scholarship_name = $request->get('scholarship_name');
                $scholarship->scholarship_desc = $request->get('scholarship_desc');
                $scholarship->amount = $request->get('amount');
                $scholarship->deadline =$request->get('deadline');
                $scholarship->slot = $request->get('slot');
                $scholarship->save();
                $success_output = '<div class="alert alert-success">Success!</div>';

            }
            
        }
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
        //eval ($goback);
    }
}
