<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
// use App\Http\Controllers\Facades\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Validator;

class ApplicantMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('admin.file_maintenance.applicant.show');
        //return Datatables::of(students::query())->make(true);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    //    // return view ('admin.file_maintenance.applicant.show');

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $none ='none';
        $isdel = 0;
        $defpass = 'pampangascholar';
        // $mobile = $request->mobile_no;
        //
        // return view ('admin.file_maintenance.applicant.show');
        $users = new User([
            'surname' => $request->surname,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'suffix' => $request->suffix,
            'gender' => $request->gender,
            'bday' => $request->bday,
            'profile_photo' => $none,
            'applicant_isdel' => $isdel,
            'mobile_number' => $request->mobile_no,
            'email' => $request->email,
            'password' => Hash::make($defpass)

        ]);
        $users->save();
        return redirect('/admin/applicant');
    }

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
        DB::raw("CONCAT(users.surname,', ',users.first_name, ' ', users.middle_name) as fullname"))->where('applicant_isdel', '0')->get();
        return DataTables::of($users)
        ->addColumn('action', function($users){
            return '<a href="#" class="btn btn-sm btn-success view" id="'.$users->id.'"><i class="fa fa-eye"></i> View</a> 
                    <a href="#" class="btn btn-sm btn-primary edit" id="'.$users->id.'"><i class="fa fa-edit"></i> Edit</a>
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
                // $faquestion = Faquestion::find($request->get('faq_id'));
                // $faquestion->question = $request->get('question');
                // $faquestion->answer = $request->get('answer');
                // $faquestion->save();
                // $success_output = '';

            }
            else if($request->get('button_action') == 'delete')
            {
                $user = User::find($request->get('del_id'));
                $user->applicant_isdel = $request->get('del_isdel');
                // $faquestion->answer = $request->get('answer');
                // $faquestion->faq_isdel = $request->get('faq_isdel');

                $user->save();
                $success_output = '';

            }
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
        //eval ($goback);
    }

}
