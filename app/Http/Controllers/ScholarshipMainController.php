<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Scholarship;
use DataTables;


class ScholarshipMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.file_maintenance.scholar.show');
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
        $scholarships = Scholarship::select('id','scholarship_name', 'scholarship_desc', 'amount', 'deadline', 'slot', 'status');
        return DataTables::of($scholarships)

        ->addColumn('action', function($scholarships){
            if($scholarships->status=="OPEN")
            {
                // return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$scholarships->id.'"><i class="fa fa-edit"></i> Edit</a>
                //     <a href="#" class="btn btn-sm btn-danger delete" id="'.$scholarships->id.'"><i class="fa fa-close"></i> Closed</a>';
                
                return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$scholarships->id.'"><i class="fa fa-edit"></i> Edit</a>
                     <a href="#" class="btn btn-sm btn-danger delete" id="'.$scholarships->id.'"><i class="fa fa-close"></i> Closed</a>';
                
                // {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                //                             {{Form::hidden('_method', 'DELETE')}}
                //                             {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                //                         {!!Form::close()!!}
            }
            else
            {
                return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$scholarships->id.'"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-sm btn-success delete" id="'.$scholarships->id.'"><i class="fa fa-check"></i> Open</a>';
            }
            
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
        $validation = Validator::make($request->all(), [
            'scholarship_name' => 'required',
            'scholarship_desc'  => 'required',
            'amount'            => 'required',
            'deadline'         => 'required',
            'slot'            => 'required',
            //'status'          => 'required'
        
        ]);
        
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
            if($request->get('button_action') == 'close')
            {
                $scholarship = Scholarship::find($request->get('scholarship_id'));
                $scholarship->scholarship_name = $request->get('scholarship_name');
                $scholarship->scholarship_desc = $request->get('scholarship_desc');
                $scholarship->amount = $request->get('amount');
                $scholarship->deadline =$request->get('deadline');
                $scholarship->slot = $request->get('slot');
                $scholarship->status = $request->get('status');
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

    function removedata(Request $request)
    {
        $scholarship = Scholarship::find($request->get('del_id'));
        $scholarship->status = $request->get('status');
        $scholarship->save();
    }
    function getstat(Request $request)
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
    }
}
