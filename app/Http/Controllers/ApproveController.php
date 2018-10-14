<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Application;
use Illuminate\Http\Request;
use DataTables;
use Auth;

class ApproveController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    function approveShow()
    {
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return view('admin.transaction.approve')->with('role', $role);
    }
    
    function searchData(Request $request)
    {
        $id = $request->input('id');
        //DB::select('select * from `application` where barcode_number = :barcode_number', ['barcode_number', $id]);
        $scholar = DB::table('application')
        ->Join('scholarships', 'scholarships.id', '=',  'application.scholar_id')
        ->where('application.barcode_number', $id)
        ->select('scholarships.scholarship_name', 'application.application_status', 'scholarships.type','application.id', 'scholarships.id AS sc_id', 'application.applicant_id AS applicant_id' )->first();
        
        
        //$name = $users->first_name . ' ' .$users->middle_name. ' '. $users->surname . ' ' . $users->suffix;
        // $address = $users->street. ', '. $users->barangay. ', '. $users->municipality;
        // $output = array(
        //     'fullname'    => $name,
        //     'email'     =>  $users->email,
        //     'address'      =>$address,
        //     'mobile_number' => $users->mobile_number
        // );
        
        $type = $scholar->type;
       
        if ($type == "eefap")
        {
            $users = DB::table('eefap')
            ->Join('application', 'application.id', '=',  'eefap.application_id')->JOIN('users', 'users.id', '=', 'application.applicant_id')
            ->where('application.barcode_number', $id)->where('application.application_status', '=', 'Pending')->orwhere('application.application_status', '=', 'Authenticating')
            ->select(DB::raw("CONCAT_WS('', eefap.surname,', ', eefap.first_name, ' ', eefap.middle_name, ' ', eefap.suffix) as fullname"), 
            DB::raw("CONCAT_WS('', eefap.street, ' ', eefap.barangay, ' ' , eefap.municipality ) as fulladdress"), 'eefap.mobile_number', 'users.school_id')->first();
        }

        else if($type == "eefap-gv")
        {
            $users = DB::table('eefapgv')
            ->Join('application', 'application.id', '=',  'eefapgv.application_id')->JOIN('users', 'users.id', '=', 'application.applicant_id')
            ->where('application.barcode_number', $id)->where('application.application_status', '=', 'Pending')->orwhere('application.application_status', '=', 'Authenticating')
            ->select(DB::raw("CONCAT_WS('', eefapgv.surname,', ', eefapgv.first_name, ' ', eefapgv.middle_name, ' ', eefapgv.suffix) as fullname"), 
            DB::raw("CONCAT_WS('', eefapgv.street, ' ', eefapgv.barangay, ' ' , eefapgv.municipality ) as fulladdress"), 'eefapgv.mobile_number', 'users.school_id')->first();
        }

        else if($type == "pcl")
        {
            $users = DB::table('pcl')
            ->Join('application', 'application.id', '=',  'pcl.application_id')->JOIN('users', 'users.id', '=', 'application.applicant_id')
            ->where('application.barcode_number', $id)->where('application.application_status', '=', 'Pending')->orwhere('application.application_status', '=', 'Authenticating')
            ->select(DB::raw("CONCAT_WS('', pcl.surname,', ', pcl.first_name, ' ', pcl.middle_name, ' ', pcl.suffix) as fullname"), 
            DB::raw("CONCAT_WS('', pcl.street, ' ', pcl.barangay, ' ' , pcl.municipality ) as fulladdress"), 'pcl.mobile_number', 'users.school_id')->first();
        }

         $output = array(
            'name'   =>$users->fullname,
            'type'  => $scholar->type,
            'scholarship'      =>$scholar->scholarship_name,
            'address' =>   $users->fulladdress,
            'aid' => $scholar->id,
            'mobile_number' => $users->mobile_number,
            'sc_id' => $scholar->sc_id,
            'applicant_id' => $scholar->applicant_id,
            'school_id' => $users->school_id
        );
        echo json_encode($output);
    }

    function approved(Request $request)
    {  
        if($request->get('action') == 'approved')
        {
            $id = $request->get('aid');
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

            return redirect('/admin/approve');

        }
        else if ($request->get('action') == 'disapproved')
        {
            $id = $request->get('aid');
            $approve =  'Disapproved';
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
            // $approval = DB::table('approval_date')->insert([
            // 'status' => $approve,
            // 'application_id' => $id,
            // 'date_approved' => date('Y-m-d'),
            // 'applicant_id' => $request->get('applicant_id'),
            // 'scholarship_id' => $request->get('sc_id'),
            // 'employee_id' => '0'

            // ]);

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $history = DB::table('history_log')->insert([
                'action'  => 'Application Disapproved',
                'date'     => date('Y-m-d'),
                'time'     =>$time,
                'applicant_id' => $request->get('applicant_id'),
                'scholar_id' => $request->get('sc_id')

            ]);

            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $audit = DB::table('audit_log')->insert([
            'a_date' => date('Y-m-d'),
            'a_time' => $time,
            'action' => 'Application Disapproved',
            'employee_id' => Auth::user()->id
            ]);

           

            return redirect('/admin/approve');
        }

    }

    function listapproved()
    {   
        $stat = "Pre-Approved";
        $approve = DB::table('approval_date')
        ->Join('users', 'users.id', '=',  'approval_date.applicant_id')
        ->JOIN('application', 'application.id', '=', 'approval_date.application_id')
        ->Join('scholarships', 'scholarships.id', '=',  'approval_date.scholarship_id')
        ->Join('admins', 'admins.id',  '=', 'approval_date.employee_id')
        ->where('application.application_status', $stat)
        ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"),
        DB::raw("CONCAT_WS('', admins.surname,', ', admins.first_name, ' ', admins.middle_name, ' ', admins.suffix) as empfullname"), 'scholarships.scholarship_name', DB::raw("DATE_FORMAT(approval_date.date_approved, '%W, %d %M %Y') as date_approved"))->get();
        return DataTables::of($approve)
        ->addColumn('action', function($approve){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$approve->fullname.'"><i class="fa fa-edit"></i>Apply</a>';
        })
        ->make(true);
    }

    function listapproved2()
    {   
        $stat = "Disapproved";
        $approve = DB::table('approval_date')
        ->Join('users', 'users.id', '=',  'approval_date.applicant_id')
        ->Join('scholarships', 'scholarships.id', '=',  'approval_date.scholarship_id')
        ->Join('admins', 'admins.id',  '=', 'approval_date.employee_id')
        ->where('approval_date.status', $stat)
        ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"),
        DB::raw("CONCAT_WS('', admins.surname,', ', admins.first_name, ' ', admins.middle_name, ' ', admins.suffix) as empfullname"), 'scholarships.scholarship_name', DB::raw("DATE_FORMAT(approval_date.date_approved, '%W, %d %M %Y') as date_approved") )->get();
        return DataTables::of($approve)
        ->addColumn('action', function($approve){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$approve->fullname.'"><i class="fa fa-edit"></i>Apply</a>';
        })
        ->make(true);
    }


    function admindash()
    {
        return "none!";
    }
}
