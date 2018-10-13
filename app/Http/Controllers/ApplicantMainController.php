<?php

namespace App\Http\Controllers;

use App\User;
use App\Personal;
use Illuminate\Http\Request;
// use App\Http\Controllers\Facades\DB;
use DB;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Validator;
use Auth;
use Mail;
use App\Mail\RegSuccess;

class ApplicantMainController extends Controller
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
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return view ('admin.file_maintenance.applicant.show')->with('role', $role);
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

        $this -> validate($request, [
            'surname' => 'required|string|regex:/^[a-zA-Z]+$/u|max:50',  
            'first_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:50',
            'middle_name' => 'nullable|regex:/^[a-zA-Z]+$/u|max:50',
            'suffix' => 'nullable|regex:/^[a-zA-Z]+$/u|max:50',
            'school_id' => 'required|unique:users',
        ]);	


        if($request->get('gender') == 'Male')
        {
            $none ='male.png';
        }
        else
        {
            $none = 'female.png';
        }
        
        $isdel = 0;

        $length=8;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
      
        $defpass = $randomString;

        // $defpass = 'pampangascholar';
        // $mobile = $request->mobile_no;
        //
        // return view ('admin.file_maintenance.applicant.show');

        $var = $request->bday;
        $date = str_replace('/', '-', $var);
        $dta = date('Y-m-d', strtotime($date));

        $users = new User([
            'surname' => $request->surname,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'suffix' => $request->suffix,
            'gender' => $request->gender,
            'bday' => $dta,
            'profile_photo' => $none,
            'applicant_isdel' => $isdel,
            'mobile_number' => $request->mobile_no,
            'email' => $request->email,
            'password' => Hash::make($defpass),
            'school_id' => $request->school_id,
            'chg'  => 1,
            'new'  =>1

        ]);
        $users->save();
        $email = $request->get('email');
        $name =  $request->first_name.' '.$request->middle_name.' '.$request->surname.' '.$request->suffix;
        $arr = array(
            'name' => $name,
            'pass' => $defpass
        );


        
       // Mail::to($request->get('email'))->send(new RegSuccess($name));
        \Mail::to($email)->send(new RegSuccess($arr));

        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $audit = DB::table('audit_log')->insert([
        'date' => date('Y-m-d'),
        'time' => $time,
        'action' => 'Registered new applicant',
        'employee_id' => Auth::user()->id
        ]);

        return redirect('/admin/reg/success');
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
        DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"))->where('applicant_isdel', '0')->get();
        return DataTables::of($users)
        ->addColumn('action', function($users){
            return '<a href="#" class="btn btn-sm btn-success view" id="'.$users->id.'"><i class="fa fa-eye"></i> View</a> 
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$users->id.'"><i class="fa fa-trash"></i> Delete</a> ';
        })
        ->make(true);

    }
    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $pid = DB::table('personal_info')->where('applicant_id', $id)->first();
        $ppid= $pid->id;
        $personal = Personal::find($ppid);

        $output = array(
            'surname'    =>  $user->surname,
            'first_name'     =>  $user->first_name,
            'applicant_isdel' => $user->applicant_isdel,
            'nationality'   => $personal->nationality,
            'religion'     => $personal->religion,
            'civil_status' => $personal->civil_status,
            'birth_place' => $personal->birth_place,
            'gender'     => $user->gender,
            'bday'       => $user->bday,
            'mobile_number' => $user->mobile_number,
            'fullname'   => $user->first_name.' '.$user->middle_name.' '.$user->surname.' '.$user->suffix,
            'address'    =>$personal->street.' '.$personal->barangay.', '.$personal->municipality

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

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                'date' => date('Y-m-d'),
                'time' => $time,
                'action' => 'Applicant Archived',
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
