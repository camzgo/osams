<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faquestion;
use DataTables;
use Validator;

class FaqArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('admin.archive.faqs.show');
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
        $faquestions = Faquestion::select('id','question', 'answer')->where('faq_isdel', '1')->get();
        return DataTables::of($faquestions)
        ->addColumn('action', function($faquestions){
            return '<a href="#" class="btn btn-sm btn-success edit" id="'.$faquestions->id.'"><i class="fa fa-refresh"></i> Restore </a>
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
        
        $error_array = array();
        $success_output = '';
        $def = 0;
        $refresh = "return redirect('/faqs');";
        if($request->get('button_action') == 'update')
        {
            $faquestion = Faquestion::find($request->get('faq_id'));
            // $faquestion->question = $request->get('del_question');
            // $faquestion->answer = $request->get('del_answer');
            $faquestion->faq_isdel = $request->get('faq_isdel');
            $faquestion->save();
            $success_output = '';

        }
        else if($request->get('button_action') == 'delete')
        {
            $faquestion = Faquestion::find($request->get('faq_id'));
            $faquestion->question = $request->get('question');
            $faquestion->answer = $request->get('answer');
            $faquestion->faq_isdel = $request->get('faq_isdel');

            $faquestion->save();
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
        $faquestion = Faquestion::find($request->input('id'));
        if($faquestion->delete())
        {
            echo 'It was successfully deleted!';
        }
    }
}
