<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use Auth;

class SubController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show()
    {
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        return view('admin.submission.show')->with('role', $role);
    }
    
    function getdata()
    {
        $app1 = DB::table('application')->where('application_status', "Pending")->get();
        $ctr = DB::table('application')->where('application_status', "Pending")->count();
        $datas = $app1->toJson();
        $json = json_decode($datas, true);
        
        for($x = 0; $x<=$ctr-1; $x++)
        {
            if($json[$x]['scholar_id'] == 8)
            {
                $app = DB::table('application')->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('reqgv', 'reqgv.scholar_id', '=', 'application.scholar_id')->JOIN('users', 'users.id', '=', 'application.applicant_id')
                ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'application.applicant_id AS applicant_id', 
                'application.application_status', 'application.id AS app_id', 'scholarships.scholarship_name', 'scholarships.id as scid')
                ->where('application.application_status', 'Pending')->where('reqgv.submit', 1)->get(); 
                    
            }
            else
            {
                $app = DB::table('application')->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('reqeefap', 'reqeefap.scholar_id', '=', 'application.scholar_id')->JOIN('users', 'users.id', '=', 'application.applicant_id')
                ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'application.applicant_id AS applicant_id', 
                'application.application_status', 'application.id AS app_id', 'scholarships.scholarship_name', 'scholarships.id as scid')
                ->where('application.application_status', 'Pending')->where('reqeefap.submit', 1)->get(); 
            }
        }
        // $app = DB::table('application')->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('users', 'users.id', '=', 'application.applicant_id')
        // ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'application.applicant_id AS applicant_id', 
        // 'application.application_status', 'application.id AS app_id', 'scholarships.scholarship_name', 'scholarships.id as scid')
        // ->where('application.application_status', 'Pending')->get();
        return DataTables::of($app)

        ->addColumn('action', function($app){
                       
            return '<a href="submission/details/'.$app->scid.'" class="btn btn-sm btn-primary edit" id="'.$app->app_id.'"><i class="fa fa-eye"></i> View</a>';

        })
        ->make(true);
        

    }
    public function details($id)
    {
        $scholarships = DB::table('scholarships')->where('id', $id)->first();
        $app = DB::table('application')->where('scholar_id', $id)->where('application_status', "Pending")->first();
       $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();


        
       if($scholarships->type == "eefap")
       {
            $req = DB::table('reqeefap')->where('submit', 1)->where('application_id', $app->id)->first();  
            return view('admin.submission.details')->with('req', $req)->with('role', $role)->with('scholarships', $scholarships)->with('app', $app);
       }
       else if($scholarships->type == "eefap-gv")
       {
           if($scholarships->id == 7)
           {
                $req = DB::table('reqeefap')->where('submit', 1)->where('application_id', $app->id)->first();  
                return view('admin.submission.details')->with('req', $req)->with('role', $role)->with('scholarships', $scholarships)->with('app', $app);
           }
           else
           {
                $req = DB::table('reqgv')->where('submit', 1)->where('application_id', $app->id)->first();  
                return view('admin.submission.details')->with('req', $req)->with('role', $role)->with('scholarships', $scholarships)->with('app', $app);
           }
       } 
       else if ($scholarships->type == "pcl")
       {
           $req = DB::table('reqeefap')->where('submit', 1)->where('application_id', $app->id)->first();  
            return view('admin.submission.details')->with('req', $req)->with('role', $role)->with('scholarships', $scholarships)->with('app', $app);
       }

    }
    public function uploadreq($upload)
    {
        $up = $upload;
        return view('admin.submission.upload')->with('up', $up);
    }
    public function uploadpdf($upload)
    {
        $up = $upload;
        return view('admin.submission.uploadpdf')->with('up', $up);
    }

    public function approvedreq(Request $request)
    {
        if($request->get('action') == 'approved')
        {
            $id = $request->get('app_id');
            $approve =  'Pre-Approved';
            DB::table('application')->where('id', $id)
            ->update([
                'application_status' => $approve
            ]);

            $approval = DB::table('approval_date')->insert([
            'status' => $approve,
            'application_id' => $id,
            'date_approved' => date('Y-m-d'),
            'applicant_id' => $request->get('applicant_id'),
            'scholarship_id' => $request->get('sc_id'),
            'employee_id' => Auth::user()->id

            ]);

             $approval = DB::table('approval_date')->insert([
            'status' => $approve,
            'application_id' => $id,
            'date_approved' => date('Y-m-d'),
            'applicant_id' => $request->get('applicant_id'),
            'scholarship_id' => $request->get('sc_id'),
            'employee_id' => Auth::user()->id

            ]);

            // $log = DB::table('log')->insert([
            //     'desc' => 'Your application has been pre-approved.',
            //     'scholar_id' => $request->get('scholarship_id'),
            //     'tracking_id' => $request->get('scholarship_id'),
            //     'created_at' => date('Y-m-d H:i:s')
            // ]);

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            
            $log = DB::table('log')->insert([
                'description' => 'Your application has been pre-approved and being re-check.',
                'scholar_id' => $request->get('sc_id'),
                'applicant_id' => $request->get('applicant_id'),
                'employee_id'  => Auth::user()->id,
                'remarks'    => $request->get('remarks'),
                'date' => date('Y-m-d'),
                'time' => $time
            ]);


            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $history = DB::table('history_log')->insert([
                'action'  => 'Application Pre-Approved',
                'date'     => date('Y-m-d'),
                'time'     =>$time,
                'applicant_id' => $request->get('applicant_id'),
                'scholar_id' => $request->get('sc_id'),
            ]);

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $audit = DB::table('audit_log')->insert([
            'a_date' => date('Y-m-d'),
            'a_time' => $time,
            'action' => 'Application Pre-Approved',
            'employee_id' => Auth::user()->id
            ]);
            return redirect('/admin/submission');

        }
        else if ($request->get('action') == 'disapproved')
        {
            $id = $request->get('app_id');
            $approve =  'Disapproved';
            DB::table('application')->where('id', $id)
            ->update([
                'application_status' => $approve
            ]);

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $history = DB::table('history_log')->insert([
                'action'  => 'Application Disapproved',
                'date'     => date('Y-m-d'),
                'time'     =>$time,
                'applicant_id' => $request->get('applicant_id')
            ]);
            

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $audit = DB::table('audit_log')->insert([
            'a_date' => date('Y-m-d'),
            'a_time' => $time,
            'action' => 'Application Disapproved',
            'employee_id' => Auth::user()->id
            ]);
            
            // $approval = DB::table('approval_date')->insert([
            // 'status' => $approve,
            // 'application_id' => $id,
            // 'date_approved' => date('Y-m-d'),
            // 'applicant_id' => $request->get('applicant_id'),
            // 'scholarship_id' => $request->get('sc_id'),
            // 'employee_id' => '0'

            // ]);

            return redirect('/admin/submission');
        }
        
    }

}
