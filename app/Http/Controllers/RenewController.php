<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use DataTables;
use App\Eefap;
use App\Eefapgv;
use App\Pcl;

class RenewController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    function show()
    {
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        return view('admin.transaction.renew')->with('role', $role);
    }

    function getdata()
    {
      
        $users = DB::table('users')
        ->leftJoin('application', 'application.applicant_id', '=', 'users.id')->where('application.application_status', 'Renew')
        //->where(DB::raw("application.applicant_id IS NULL"))
        ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'users.id', 'users.email', 'application.id as app_id', 'application.scholar_id as scid')->get();
        return DataTables::of($users)
        ->addColumn('action', function($users){
            $scholar = DB::table('scholarships')->where('id', $users->scid)->first();

            if($scholar->type == "eefap")
            {
                return '<a href="/admin/renew/eefap/'.$users->app_id.'" class="btn btn-sm btn-primary edit " id="'.$users->app_id.'"><i class="fa fa-refresh"></i> Renew</a>';
            }

            else if ($scholar->type == "eefap-gv")
            {
                return '<a href="/admin/renew/eefapgv/'.$users->app_id.'" class="btn btn-sm btn-primary edit " id="'.$users->app_id.'"><i class="fa fa-refresh"></i> Renew</a>';
            }
            else if ($scholar->type == "pcl")
            {
                return '<a href="/admin/renew/pcl/'.$users->app_id.'" class="btn btn-sm btn-primary edit " id="'.$users->app_id.'"><i class="fa fa-refresh"></i> Renew</a>';
            }
            
        })
        ->make(true);
    }

    public function vieweefap($id)
    {
        $eefap = DB::table('eefap')->where('application_id', $id)->first();
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return view ('admin.scholarships.scholar1-edit')->with('role', $role)->with('eefap', $eefap)->with('municipal_list', $municipal_list);
    }
    function editeefap(Request $request)
    {
        $eefapId = DB::table('eefap')->where('application_id', $request->get('sid'))->first();
        $eid =  $eefapId->id;
        
        $eefap = Eefap::find($eid);
        $eefap->surname = $request->get('surname');
        $eefap->first_name = $request->get('first_name');
        $eefap->middle_name = $request->get('middle_name');
        $eefap->suffix = $request->get('suffix');
        $eefap->mobile_number = $request->get('mobile_no');
        $eefap->municipality = $request->get('municipality');
        $eefap->barangay = $request->get('barangay');
        $eefap->street = $request->get('street');
        $eefap->college_name = $request->get('college_name');
        $eefap->college_address = $request->get('college_address');
        $eefap->course = $request->get('course');
        $eefap->major = $request->get('major');
        $eefap->program_type = $request->get('educ_prog');
        $eefap->year_level = $request->get('yr_lvl');
        $eefap->graduating = $request->get('grad');
        $eefap->general_average = $request->get('gen_average');
        $eefap->fb_account = $request->get('fb_account');
        $eefap->gsurname = $request->get('gsurname');
        $eefap->gfirst_name = $request->get('gfirst_name');
        $eefap->gmiddle_name = $request->get('gmiddle_name');
        $eefap->gsuffix = $request->get('gsuffix');
        $eefap->gmobile_number = $request->get('gmobile_no');
        $eefap->save();

        $approve = "Pending";
        

        $gradee = DB::table('grades')->where('student_id', $request->get('app_id'))->update([
            'grades_isdel' => 1,
            'new'     => 0
        ]);


        DB::table('application')->where('id', $request->get('sid'))
        ->update([
            'application_status' => $approve,
            'renew'     => 1
        ]);

        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $history = DB::table('history_log')->insert([
            'action'  => 'Application Renewed',
            'date'     => date('Y-m-d'),
            'time'     =>$time,
            'applicant_id' => $request->get('app_id'),
            'scholar_id' => $eefapId->scholarship_id

        ]);


        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $audit = DB::table('audit_log')->insert([
            'a_date' => date('Y-m-d'),
            'a_time' => $time,
            'action' => 'Application Renewed',
            'employee_id' => Auth::user()->id
        ]);


        $ctr = $request->get('nos');
        $sub1 = array();
        $grad1 = array();
        for($x=0; $x<=$ctr-1; $x++)
        {
            $sub = "subject".$x;
            $grad = "grade".$x;
            array_push($sub1, $request->$sub);
            array_push($grad1, $request->$grad);
        }
        

        for($y=0; $y<=$ctr-1; $y++)
        {
            $grades = DB::table('grades')->insert([
                'subject' => $sub1[$y],
                'grades' => $grad1[$y],
                'semester' => $request->sem,
                'student_id' => $eefapId->applicant_id,
                'new'     => "1",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'grades_isdel' => 0
            ]);
        }


       $ids=$request->get('app_id');
        return redirect ('admin/renew/send/'.$ids);
    }

    public function vieweefapgv($id)
    {
        $eefapgv = DB::table('eefapgv')->where('application_id', $id)->first();
         $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return view ('admin.scholarships.scholar2-edit')->with('role', $role)->with('eefapgv', $eefapgv)->with('municipal_list', $municipal_list);
    }

    public function editeefapgv(Request $request)
    {
        $eefapgvId = DB::table('eefapgv')->where('application_id', $request->get('sid'))->first();
        $id = $eefapgvId->id;
        
        $eefapgv = Eefapgv::find($id);
        $eefapgv->surname = $request->get('surname');
        $eefapgv->first_name = $request->get('first_name');
        $eefapgv->middle_name = $request->get('middle_name');
        $eefapgv->suffix = $request->get('suffix');
        $eefapgv->mobile_number = $request->get('mobile_no');
        $eefapgv->municipality = $request->get('municipality');
        $eefapgv->barangay = $request->get('barangay');
        $eefapgv->street = $request->get('street');
        $eefapgv->college_name = $request->get('college_name');
        $eefapgv->college_address = $request->get('college_address');
        $eefapgv->course = $request->get('course');
        $eefapgv->major = $request->get('major');
        $eefapgv->program_type = $request->get('educ_prog');
        $eefapgv->year_level = $request->get('yr_lvl');
        $eefapgv->graduating = $request->get('grad');
        $eefapgv->general_average = $request->get('gen_average');
        $eefapgv->awards =$request->get('award');
        $eefapgv->save();

        $approve = "Pending";
        
        DB::table('application')->where('id', $request->get('sid'))
        ->update([
            'application_status' => $approve,
            'renew'     => 1
        ]);

        $gradee = DB::table('grades')->where('student_id', $request->get('app_id'))->update([
            'grades_isdel' => 1,
            'new'     => 0
        ]);
        
        
        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $history = DB::table('history_log')->insert([
            'action'  => 'Application Renewed',
            'date'     => date('Y-m-d'),
            'time'     =>$time,
            'applicant_id' => $request->get('sid'),
            'scholar_id' => $eefapgvId->scholarship_id

        ]);

        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $audit = DB::table('audit_log')->insert([
            'a_date' => date('Y-m-d'),
            'a_time' => $time,
            'action' => 'Application Renewed',
            'employee_id' => Auth::user()->id
        ]);


        $ctr = $request->get('nos');
        $sub1 = array();
        $grad1 = array();
        for($x=0; $x<=$ctr-1; $x++)
        {
            $sub = "subject".$x;
            $grad = "grade".$x;
            array_push($sub1, $request->$sub);
            array_push($grad1, $request->$grad);
        }
        

        for($y=0; $y<=$ctr-1; $y++)
        {
            $grades = DB::table('grades')->insert([
                'subject' => $sub1[$y],
                'grades' => $grad1[$y],
                'semester' => $request->sem,
                'student_id' => $eefapgvId->applicant_id,
                'new'     => "1",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'grades_isdel' => 0
            ]);
        }

        $ids=$request->get('app_id');
        return redirect ('admin/renew/send/'.$ids);
    }


    public function viewpcl($id)
    {
        $pcl = DB::table('pcl')->where('application_id', $id)->first();
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        $district_list = DB::select('select district FROM `munbar` GROUP BY district');
        return view ('admin.scholarships.scholar3-edit')->with('role', $role)->with('pcl', $pcl)->with('district_list', $district_list);
    }



    public function editpcl(Request $request)
    {
        $pclId = DB::table('pcl')->where('application_id', $request->get('sid'))->first();
        $id = $pclId->id;
        
        $pcl = Pcl::find($id);
        $pcl->surname = $request->get('surname');
        $pcl->first_name = $request->get('first_name');
        $pcl->middle_name = $request->get('middle_name');
        $pcl->suffix = $request->get('suffix');
        $pcl->mobile_number = $request->get('mobile_no');
        $pcl->district = $request->get('district');
        $pcl->municipality = $request->get('municipality');
        $pcl->barangay = $request->get('barangay');
        $pcl->street = $request->get('street');
        $pcl->school_enrolled = $request->get('college_name');
        $pcl->course = $request->get('course');
        $pcl->year_level = $request->get('yr_lvl');
        $pcl->fsurname = $request->get('fsurname');
        $pcl->ffirst_name = $request->get('ffirst_name');
        $pcl->fmiddle_name = $request->get('fmiddle_name');
        $pcl->fsuffix = $request->get('fsuffix');
        $pcl->foccupation = $request->get('foccupation');
        $pcl->msurname = $request->get('msurname');
        $pcl->mfirst_name = $request->get('mfirst_name');
        $pcl->mmiddle_name = $request->get('mmiddle_name');
        $pcl->msuffix = $request->get('msuffix');
        $pcl->moccupation = $request->get('moccupation');
        $pcl->address = $request->get('gaddress');
        $pcl->emergency = $request->get('emergency');
        $pcl->emobile_number = $request->get('emobile_no');
        $pcl->gender  = $request->get('gender');
        $pcl->birthdate = $request->get('bday');
        $pcl->nationality = $request->get('nationality');
        $pcl->religion = $request->get('religion');
        $pcl->civil_status = $request->get('civil_status');
        $pcl->birth_place = $request->get('birth_place');
        $pcl->save();


        $approve = "Pending";
        
        DB::table('application')->where('id', $request->get('sid'))
        ->update([
            'application_status' => $approve,
            'renew'     => 1
        ]);

        $gradee = DB::table('grades')->where('student_id', $request->get('app_id'))->update([
            'grades_isdel' => 1,
            'new'     => 0
        ]);
        
        
        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $history = DB::table('history_log')->insert([
            'action'  => 'Application Renewed',
            'date'     => date('Y-m-d'),
            'time'     =>$time,
            'applicant_id' => $request->get('sid'),
            'scholar_id' => 6

        ]);

        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $audit = DB::table('audit_log')->insert([
            'a_date' => date('Y-m-d'),
            'a_time' => $time,
            'action' => 'Application Renewed',
            'employee_id' => Auth::user()->id
        ]);


        $ctr = $request->get('nos');
        $sub1 = array();
        $grad1 = array();
        for($x=0; $x<=$ctr-1; $x++)
        {
            $sub = "subject".$x;
            $grad = "grade".$x;
            array_push($sub1, $request->$sub);
            array_push($grad1, $request->$grad);
        }
        

        for($y=0; $y<=$ctr-1; $y++)
        {
            $grades = DB::table('grades')->insert([
                'subject' => $sub1[$y],
                'grades' => $grad1[$y],
                'semester' => $request->sem,
                'student_id' => $pclId->applicant_id,
                'new'     => "1",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'grades_isdel' => 0
            ]);
        }

        $ids=$request->get('app_id');
        return redirect ('admin/renew/send/'.$ids);
    }
    function showsend($data)
    {
        $name =$data;
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
         return view ('admin.scholarships.application2')->with('name', $name)->with('role', $role);
    }


    function pclfetch(Request $request)
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
