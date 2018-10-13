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
use App\AccountType;
use Auth;
use App\Mail\RegSuccessUser;
class UsersMainController extends Controller
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
        return view ('admin.file_maintenance.users.show')->with('role', $role);
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
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $accnt = DB::select('select account_name, id from account_type WHERE account_name != "Admin"');
        return view ('admin.file_maintenance.users.create-step-3')->with('municipal_list', $municipal_list)->with('accnt', $accnt)->with('role', $role);
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
        //$pass = 'defaultpassword';

        $length=8;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        
        $pass = $randomString;

        $suffix = $request->suffix;
        // if($suffix=="")
        
        $id = DB::table('admins')->insertGetId([
            'email' => $request->email,
            'password' => Hash::make($pass), 
            'user_photo' => "avatar5_1537131277.png",
            'user_isdel' => $user_isdel,
            'surname' => $request->surname,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'suffix' => $request->suffix,
            'account_id' => $request->user_type,
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

        $var = $request->bday;
        $date = str_replace('/', '-', $var);
        $dta = date('Y-m-d', strtotime($date));

        $adminsInfo = new AdminInfo ([
            'gender' => $request->gender,
            'birthdate' => $dta,
            'civil_status' => $request->civil_status,
            'mobile_number' => $request->mobile_no,
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'street' => $request->_street,
            'admins_id' => $id
        ]);
        $adminsInfo->save();
        $email = $request->get('email');
        $name = $request->first_name.' '.$request->middle_name.' '.$request->surname.' '.$request->suffix;

        $arr2 = array(
            'name' => $name,
            'pass' => $pass
        );

        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $audit = DB::table('audit_log')->insert([
            'date' => date('Y-m-d'),
            'time' => $time,
            'action' => 'Users added new data',
            'employee_id' => Auth::user()->id
        ]);

         \Mail::to($email)->send(new RegSuccessUser($arr2));
        return redirect('/admin/employee/');

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
        $admins = DB::table('admins')
        ->join('account_type', 'account_type.id', '=', 'admins.account_id')
        ->select("admins.id","admins.email", "account_type.account_name",
        DB::raw("CONCAT_WS('', admins.surname,', ', admins.first_name, ' ', admins.middle_name, ' ', admins.suffix) as fullname"))->where('user_isdel', '0')->get();
        return DataTables::of($admins)
        ->addColumn('action', function($admins){
            return '<a href="#" class="btn btn-sm btn-danger delete" id="'.$admins->id.'"><i class="fa fa-trash"></i> Delete</a> ';
        })
        // ->addColumn('checkbox', '<input type="checkbox" name="form_checkbox[]" class="form_checkbox" value="{{$id}}"/>')
        // ->rawColumns(['checkbox', 'action'])
        ->make(true);

    }
    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $admin = Admin::find($id);
        $output = array(
            'email'    =>  $admin->email,
            'surname'     =>  $admin->surname,
            'user_isdel' => $admin->user_isdel
        );
        echo json_encode($output);
        //eval ($goback);
    }

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'emp_isdel' => 'required',
            'emp_id'  => 'required',
        ]);
        
        $error_array = array();
        $success_output = '';
        $def = 0;
        $refresh = "return redirect('/employee');";
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            
            if($request->get('button_action') == 'delete')
            {
                $admin = Admin::find($request->get('emp_id'));
                $admin->user_isdel = $request->get('emp_isdel');
                // $faquestion->answer = $request->get('answer');
                $admin->save();

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                    'date' => date('Y-m-d'),
                    'time' => $time,
                    'action' => 'Users Archived',
                    'employee_id' => Auth::user()->id
                ]);

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


    function profile()
    {
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
         $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        $info = DB::table('admins_info')->where('admins_id', Auth::user()->id)->first();
        return view ('admin.file_maintenance.users.emprofile')->with('municipal_list', $municipal_list)->with('info', $info)->with('role', $role);
    }

    function uploadProfile(Request $request)
    {
         $this -> validate($request, [
            'uploadfile' => 'image|nullable'
        ]);

        if($request->hasFile('uploadfile'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('uploadfile')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('uploadfile')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('uploadfile')->storeAs('public/profile_images', $fileNameToStore);
        }
        else
        {
             $fileNameToStore = 'noimage.jpg';
        }

        $admins = Admin::find(Auth::user()->id);
        $admins->user_photo = $fileNameToStore;
        $admins->save();

        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $audit = DB::table('audit_log')->insert([
            'date' => date('Y-m-d'),
            'time' => $time,
            'action' => 'Users Uploaded a new profile photo',
            'employee_id' => Auth::user()->id
        ]);
        return redirect ('/admin/profile');
    }

    function editprofile()
    {
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
         $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        $info = DB::table('admins_info')->where('admins_id', Auth::user()->id)->first();
        return view ('admin.file_maintenance.users.emprofile-edit')->with('municipal_list', $municipal_list)->with('info', $info)->with('role', $role);
    }

    function editStored(Request $request)
    {
        $adid = DB::table('admins_info')->where('admins_id', Auth::user()->id)->first();
        $id = $adid->id;

        if(Auth::user()->email != $request->get('email'))
        {
            $this -> validate($request, [
                'email' => 'required|string|email|max:255|unique:admins'
            ]);
        }

        $admins = Admin::find(Auth::user()->id);
        $admins->surname=  $request->get('surname');
        $admins->first_name= $request->get('first_name');
        $admins->middle_name= $request->get('middle_name');
        $admins->suffix= $request->get('suffix');
        $admins->email= $request->get('email');
        $admins->save();

        
        $stored = AdminInfo::find($id);
        $stored->gender = $request->get('gender');
        $stored->birthdate=$request->get('bday');
        $stored->civil_status=$request->get('civil_status');
        $stored->municipality= $request->get('municipality');
        $stored->barangay = $request->get('barangay');
        $stored->street = $request->get('street');
        $stored->mobile_number = $request->get('mobile_no');
        $stored->save();

        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $audit = DB::table('audit_log')->insert([
            'date' => date('Y-m-d'),
            'time' => $time,
            'action' => 'Users Updated Information',
            'employee_id' => Auth::user()->id
        ]);
        return redirect('/admin/profile');
    }

    function editpass()
    {
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        return view ('admin.file_maintenance.users.emprofile-pass')->with('role', $role);
    }
    function storedpass(Request $request)
    {
       if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->new = 0;
        $user->save();

        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $audit = DB::table('audit_log')->insert([
            'date' => date('Y-m-d'),
            'time' => $time,
            'action' => 'Users Change Password',
            'employee_id' => Auth::user()->id
        ]);
 
       // return redirect()->back()->with("success","Password changed successfully !");
       return redirect('/admin/profile');

    }
}
