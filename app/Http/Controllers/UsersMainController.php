<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\AdminInfo;
use DataTables;
use Validator;
use DB;
use App\Municipality;


class UsersMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view ('admin.file_maintenance.users.show');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        //
        
        // $municipal_list = DB::table('munbar')->groupBy('municipality')->get();
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return view ('admin.file_maintenance.users.create-step-3')->with('municipal_list', $municipal_list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return view ('admin.file_maintenance.users.chk');

        // $admin = new Admin([
            
        // ]);
        // $announce->save();
        $user_photo = "None";
        $user_isdel = 0;
        $pass = 'defaultpassword';

        $suffix = $request->suffix;
        // if($suffix=="")
        
        $id = DB::table('admins')->insertGetId([
            'email' => $request->email,
            'password' => Hash::make($pass), 
            'user_photo' => $user_photo,
            'user_isdel' => $user_isdel,
            'surname' => $request->surname,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'suffix' => $request->suffix,
            'account_id' => $user_isdel,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        // $admins =  new Admin ([
            

        // ]);

        // $email = $request->email;
        // $admins->save(); 
        
        // $eid = DB::table('admins')->insertGetId(
        //     array('email' => $email)
        // );

        // $mail = 'shishi@mail.com';
        // $query = DB::select('select id from admins where email = ?', [$mail]);
        // $idint = (int)$query;
        $adminsInfo = new AdminInfo ([
            'gender' => $request->gender,
            'birthdate' => $request->bday,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'civil_status' => $request->civil_status,
            'mobile_number' => $request->mobile_no,
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'street' => $request->_street,
            'admins_id' => $id
        ]);
        $adminsInfo->save();
        
        return redirect('/users/');

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
        $admins = Admin::select("email",
        DB::raw("CONCAT(admins.surname,', ',admins.first_name, ' ', admins.middle_name, ' ', admins.suffix) as fullname"))->where('user_isdel', '0')->get();
        return DataTables::of($admins)
        ->addColumn('action', function($admins){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$admins->id.'"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$admins->id.'"><i class="fa fa-trash"></i> Delete</a> ';
        })
        // ->addColumn('checkbox', '<input type="checkbox" name="form_checkbox[]" class="form_checkbox" value="{{$id}}"/>')
        // ->rawColumns(['checkbox', 'action'])
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
            }

            else if($request->get('button_action') == 'update')
            {
                $faquestion = Faquestion::find($request->get('faq_id'));
                $faquestion->question = $request->get('question');
                $faquestion->answer = $request->get('answer');
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


    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('munbar')
        ->where($select, $value)
        ->groupBy($dependent)
        ->get();
        $output = '<option value="" selected disabled>--Select--</option>';
        foreach($data as $row)
        {
        $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }
}
