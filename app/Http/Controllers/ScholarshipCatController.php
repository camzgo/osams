<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\View;
use DB;
use App\Scholarship;
use App\User;
use App\Municipality;
use Auth;



class ScholarshipCatController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function generateRandomString($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
  
    public function gadShow($id)
    {
        // return view ('admin.scholarships.eefap');

       // return view ('admin.scholarships.eefap-3');
        
    
        // $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        // return  view ('eefap')->with('municipal_list', $municipal_list);
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
       // return $randomString;
        $barcode = $randomString;
        $scholar_name = "GAD";

        $users =  User::find($id);
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');

        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return  view ('admin.scholarships.scholar1')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('scholar_name', $scholar_name)->with('barcode', $barcode)->with('users', $users)->with('role', $role);

        // return view ('admin.file_maintenance.users.create-step-2');
    }


    public function gradprivate($id)
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $barcode = $randomString;
        $scholar_name = "GRADUATE FROM PRIVATE";
        $users =  User::find($id);
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');

        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

         return  view ('admin.scholarships.scholar1')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('scholar_name', $scholar_name)->with('barcode', $barcode)->with('users', $users)->with('role', $role);
    }

    public function gradpublic($id)
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $barcode = $randomString;
        $scholar_name = "GRADUATE FROM PUBLIC";
        $users =  User::find($id);
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');

        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return  view ('admin.scholarships.scholar1')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('scholar_name', $scholar_name)->with('barcode', $barcode)->with('users', $users)->with('role', $role);
    }

    public function ncw($id)
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $barcode = $randomString;
        $scholar_name = "NCW";
        $users =  User::find($id);
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');

        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

         return  view ('admin.scholarships.scholar1')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('scholar_name', $scholar_name)->with('barcode', $barcode)->with('users', $users)->with('role', $role);
    }
    
    public function oldnew($id)
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $barcode = $randomString;
        $scholar_name = "VG OLD and NEW";
        $users =  User::find($id);
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');

        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return  view ('admin.scholarships.scholar1')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('scholar_name', $scholar_name)->with('barcode', $barcode)->with('users', $users)->with('role', $role);
    }


    public function honors($id)
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
       // return $randomString;
        $barcode = $randomString;
        $scholar_name = "HONORS and RANKS";

        $users =  User::find($id);
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');

        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return  view ('admin.scholarships.scholar2')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('scholar_name', $scholar_name)->with('barcode', $barcode)->with('users', $users)->with('role', $role);

    }

    public function dhvtsu($id)
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
       // return $randomString;
        $barcode = $randomString;
        $scholar_name = "VG DHVTSU";
        $users =  User::find($id);
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');

        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return  view ('admin.scholarships.scholar2')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('scholar_name', $scholar_name)->with('barcode', $barcode)->with('users', $users)->with('role', $role);

    }


    public function pclShow($id)
    {
    //    $district_list = DB::select('select district FROM `munbar` GROUP BY district');
    //     return  view ('eefap-pcl')->with('district_list', $district_list); 
    
    //     return  view ('eefap-pcl')->with('district_list', $district_list); 

        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
       // return $randomString;
        $barcode = $randomString;
        $users =  User::find($id);

        $district_list = DB::select('select district FROM `munbar` GROUP BY district');
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return view ('admin.scholarships.scholar3')->with('district_list', $district_list)->with('role', $role)
        ->with('barcode', $barcode)->with('users', $users); 

    }

    // public function gvShow($id)
    // {
    //     // $municipal_list = DB::select('select municipality from `munbar` group by municipality');
    //     // return  view ('eefap-gv')->with('municipal_list', $municipal_list);

    //      $municipal_list = DB::select('select municipality from `munbar` group by municipality');
    //     return  view ('admin.scholarships.scholar2')->with('municipal_list', $municipal_list);
    // }

    public function shoW()
    {
        return view ('admin.file_maintenance.users.create-step-2');
    }


    public function eefapStore(Request $request)
    {
        
        $user = DB::table('users')->where('id', $request->get('sid'))->first();


        $spes = DB::table('spes_tbl')->where('first_name', $user->first_name)->where('surname', $user->surname)->count();
        $school_id = DB::table('spes_tbl')->where('school_id', $user->school_id)->count();

        $app = DB::table('application')->where('applicant_id', $request->get('sid'))->count();
        $app2 = DB::table('application')->where('first_name', $user->first_name)->where('surname', $user->surname)->count();

        if($spes != 1 && $school_id != 1)
        {
            if($app != 1 && $app2 != 1)
            {
                $id = DB::table('application')->insertGetId([
                    'application_status' => 'Pre-Approved',
                    'renew' => '0',
                    'barcode_number' => $request->barcode,
                    'barcode_image' => 'NONE',
                    'applicant_id' => $request->sid,
                    'scholar_id' => $request->title_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                $eefap = DB::table('eefap')->insert([
                    'surname' => $request->surname,
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'suffix' => $request->suffix,
                    'municipality' => $request->municipality,
                    'barangay' => $request->barangay,
                    'street' => $request->street,
                    'mobile_number' => $request->mobile_no,
                    'fb_account' => $request->fb_account,
                    'gsurname' => $request->gsurname,
                    'gmiddle_name' => $request->gmiddle_name,
                    'gfirst_name' => $request->gfirst_name,
                    'gsuffix' => $request->gsuffix,
                    'gmobile_number' =>$request->gmobile_no,
                    'college_name' => $request->college_name,
                    'college_address' => $request->college_address,
                    'year_level' => $request->yr_lvl,
                    'course' => $request->course,
                    'major' => $request->major, 
                    'general_average' => $request->gen_average,
                    'program_type' => $request->educ_prog,
                    'graduating' => $request->grad,
                    'scholarship_id' => $request->title_id,
                    'applicant_id' => $request->sid,
                    'application_id' => $id

                    
                ]);
                
                $reqeefap = DB::table('reqeefap')->insert([
                    'scholar_id' =>  $request->title_id,
                    'applicant_id' => $request->sid,
                    'application_id' => $id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'submit'   => 0
                ]);

                    date_default_timezone_set("Asia/Manila");
                    $time = date('h:i:s', strtotime(now()));
                    $audit = DB::table('audit_log')->insert([
                        'date' => date('Y-m-d'),
                        'time' => $time,
                        'action' => 'Application Applied & Pre-approved',
                        'employee_id' => Auth::user()->id
                    ]);
                
                $ids=$id;
                return redirect('/admin/apply/send/'.$ids);
            }
            else
            {
                return redirect('/admin/apply/invalid2');
            }
        }
        else
        {
           return redirect('/admin/apply/invalid');
        }

        
    }

    public function eefapgvStore(Request $request)
    {
     

        $user = DB::table('users')->where('id', $request->get('sid'))->first();


        $spes = DB::table('spes_tbl')->where('first_name', $user->first_name)->where('surname', $user->surname)->count();
        $school_id = DB::table('spes_tbl')->where('school_id', $user->school_id)->count();

        $app = DB::table('application')->where('applicant_id', $request->get('sid'))->count();
        $app2 = DB::table('application')->where('first_name', $user->first_name)->where('surname', $user->surname)->count();

        if($spes != 1 && $school_id != 1)
        {

            if($app != 1 && $app2 != 1)
            {
                $id = DB::table('application')->insertGetId([
                    'application_status' => 'Pre-Approved',
                    'renew' => '0',
                    'barcode_number' => $request->barcode,
                    'barcode_image' => 'NONE',
                    'applicant_id' => $request->sid,
                    'scholar_id' => $request->title_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                $eefap = DB::table('eefapgv')->insert([
                    'surname' => $request->surname,
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'suffix' => $request->suffix,
                    'municipality' => $request->municipality,
                    'barangay' => $request->barangay,
                    'street' => $request->street,
                    'mobile_number' => $request->mobile_no,
                    'college_name' => $request->college_name,
                    'college_address' => $request->college_address,
                    'year_level' => $request->yr_lvl,
                    'course' => $request->course,
                    'major' => $request->major, 
                    'general_average' => $request->gen_average,
                    'program_type' => $request->educ_prog,
                    'graduating' => $request->grad,
                    'awards'=> $request->award,
                    'scholarship_id' => $request->title_id,
                    'applicant_id' => $request->sid,
                    'application_id' => $id

                    
                ]);
                
                if($request->title_id == 8)
                {
                    $reqgv = DB::table('reqgv')->insert([
                        'scholar_id' =>  $request->title_id,
                        'applicant_id' => $request->sid,
                        'application_id' => $id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'submit'   => 0
                    ]);
                }
                else
                {
                    $reqeefap = DB::table('reqeefap')->insert([
                    'scholar_id' =>  $request->title_id,
                    'applicant_id' => $request->sid,
                    'application_id' => $id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'submit'   => 0
                ]);
                }

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                    'date' => date('Y-m-d'),
                    'time' => $time,
                    'action' => 'Application Applied & Pre-approved',
                    'employee_id' => Auth::user()->id
                ]);
                
                $ids=$id;
                return redirect('/admin/apply/send/'.$ids);
            }
            else
            {
                return redirect('/admin/apply/invalid2');
            }
            
        }
        else
        {
            return redirect('/admin/apply/invalid');
        }
        
        
    }


    public function pclStore(Request $request)
    {
        

        $user = DB::table('users')->where('id', $request->get('sid'))->first();


        $spes = DB::table('spes_tbl')->where('first_name', $user->first_name)->where('surname', $user->surname)->count();
        $school_id = DB::table('spes_tbl')->where('school_id', $user->school_id)->count();

        $app = DB::table('application')->where('applicant_id', $request->get('sid'))->count();
        $app2 = DB::table('application')->where('first_name', $user->first_name)->where('surname', $user->surname)->count();

        if($spes != 1 && $school_id != 1)
        {
            if($app != 1 && $app2 != 1)
            {
                $id = DB::table('application')->insertGetId([
                    'application_status' => 'Pre-Approved',
                    'renew' => '0',
                    'barcode_number' => $request->barcode,
                    'barcode_image' => 'NONE',
                    'applicant_id' => $request->sid,
                    'scholar_id' => '6',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                $eefap = DB::table('pcl')->insert([
                    'surname' => $request->surname,
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'suffix' => $request->suffix,
                    'district' =>$request->district,
                    'municipality' => $request->municipality,
                    'barangay' => $request->barangay,
                    'street' => $request->street,
                    'mobile_number' => $request->mobile_no,

                    'fsurname' => $request->fsurname,
                    'fmiddle_name' => $request->fmiddle_name,
                    'ffirst_name' => $request->ffirst_name,
                    'fsuffix' => $request->fsuffix,
                    'foccupation' => $request->foccupation,

                    'msurname' => $request->msurname,
                    'mmiddle_name' => $request->mmiddle_name,
                    'mfirst_name' => $request->mfirst_name,
                    'msuffix' => $request->msuffix,
                    'moccupation' => $request->moccupation,

                    'address' => $request->gaddress,

                    'school_enrolled' => $request->college_name,
                    'year_level' => $request->yr_lvl,
                    'course' => $request->course,

                    'emergency' =>$request->emergency,
                    'emobile_number' => $request->mobile_no,

                    'birthdate' =>$request->bday,
                    'gender' =>$request->gender,
                    'nationality' => $request->nationality,
                    'religion' => $request->religion,
                    'civil_status' => $request->civil_status,
                    'birth_place' => $request->birth_place,
                    'scholarship_id' => '6',
                    'applicant_id' => $request->sid,
                    'application_id' => $id

                    
                ]);

                $reqeefap = DB::table('reqeefap')->insert([
                    'scholar_id' => 6,
                    'applicant_id' => $request->sid,
                    'application_id' => $id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'submit'   => 0
                ]);

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                    'date' => date('Y-m-d'),
                    'time' => $time,
                    'action' => 'Application Applied & Pre-approved',
                    'employee_id' => Auth::user()->id
                ]);

                $ids=$id;
                return redirect('/admin/apply/send/'.$ids);
            }
            else
            {
                return redirect('/admin/apply/invalid2');
            }
            
        }
        else
        {
            return redirect('/admin/apply/invalid');
        }
        
    }













    //fetching from ajax of address
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

    function pfetch(Request $request)
    {
        $select2 = $request->get('select2');
        $value2 = $request->get('value2');
        $dependent2 = $request->get('dependent2');
        $data = DB::table('munbar')
        ->where($select2, $value2)
        ->groupBy($dependent2)
        ->get();
        $output = '<option value="" selected disabled>--Select--</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent2.'">'.$row->$dependent2.'</option>';
        }
        echo $output;
    }

    function printeefap($id)
    {
        
        $app = DB::table('application')->where('applicant_id', $id)->first();
        $ssid = $app->scholar_id;
        $scholar_id = DB::table('scholarships')->where('id', $ssid)->first();

        if($scholar_id->type == "eefap")
        {
            $eefap = DB::table('eefap')->where('application_id', $app->id)->first();
            $req = DB::table('reqeefap')->where('application_id', $app->id)->first();
            return view('admin.reports.repo')->with('app',$app)->with('scholar_id', $scholar_id)->with('eefap', $eefap)->with('req', $req);
        }
        else if($scholar_id->type == "eefap-gv")
        {
            $eefap = DB::table('eefapgv')->where('application_id', $app->id)->first();
            if($scholar_id->id == 7)
            {
                $req = DB::table('reqeefap')->where('application_id', $app->id)->first();
                return view('admin.reports.repogv2')->with('app',$app)->with('scholar_id', $scholar_id)->with('eefap', $eefap)->with('req', $req);
            }
            else
            {
                $req = DB::table('reqgv')->where('application_id', $app->id)->first();
                return view('admin.reports.repogv2')->with('app',$app)->with('scholar_id', $scholar_id)->with('eefap', $eefap)->with('req', $req);
            }
            
        }
        else if($scholar_id->type == "pcl")
        {
            $eefap = DB::table('pcl')->where('application_id', $app->id)->first();
            $req = DB::table('reqeefap')->where('application_id', $app->id)->first();
            return view('admin.reports.repopcl2')->with('app',$app)->with('scholar_id', $scholar_id)->with('eefap', $eefap)->with('req', $req);
        }

       
    }

    function spes3()
    {

        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        return view('admin.scholarships.invalid')->with('role', $role);
    }
    function spes4()
    {

        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        return view('admin.scholarships.invalid2')->with('role', $role);
    }

    // function printeefapgv($id)
    // {

    // }

}
