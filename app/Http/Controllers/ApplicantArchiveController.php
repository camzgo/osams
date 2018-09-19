<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use DataTables;
use Validator;
use Auth;

class ApplicantArchiveController extends Controller
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
         return view ('admin.archive.applicant.show')->with('role', $role);
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
        $users = User::select("id", "email", "gender",
            DB::raw("CONCAT(users.surname,', ',users.first_name, ' ', users.middle_name) as fullname"))->where('applicant_isdel', '1')->get();
            return DataTables::of($users)
            ->addColumn('action', function($users){
                return '<a href="#" class="btn btn-sm btn-success edit" id="'.$users->id.'"><i class="fa fa-refresh"></i> Restore</a>
                        <a href="#" class="btn btn-sm btn-danger delete" id="'.$users->id.'"><i class="fa fa-trash"></i> Delete</a> ';
            })
            ->make(true);

    }

    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $output = array(
            'surname'    =>  $user->surname,
            'first_name'     =>  $user->first_name,
            'applicant_isdel' => $user->applicant_isdel
        );
        echo json_encode($output);
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
                $user = User::find($request->get('a_id'));
                $user->applicant_isdel = $request->get('a_isdel');
                // $faquestion->answer = $request->get('answer');
                // $faquestion->faq_isdel = $request->get('faq_isdel');

                $user->save();
                $success_output = '';


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
        $user = User::find($request->input('id'));
        if($user->delete())
        {
            echo 'It was successfully deleted!';
        }
    }

}
