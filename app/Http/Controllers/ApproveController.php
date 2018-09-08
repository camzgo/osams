<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Application;
use Illuminate\Http\Request;
use DataTables;

class ApproveController extends Controller
{
    //

    function approveShow()
    {
        return view('admin.transaction.approve');
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
            ->Join('application', 'application.id', '=',  'eefap.application_id')
            ->where('application.barcode_number', $id)->where('application.application_status', '=', 'Pending')->orwhere('application.application_status', '=', 'Authenticating')
            ->select(DB::raw("CONCAT_WS('', eefap.surname,', ', eefap.first_name, ' ', eefap.middle_name, ' ', eefap.suffix) as fullname"), 
            DB::raw("CONCAT_WS('', eefap.street, ' ', eefap.barangay, ' ' , eefap.municipality ) as fulladdress"), 'eefap.mobile_number')->first();
        }

        else if($type == "eefap-gv")
        {
            $users = DB::table('eefapgv')
            ->Join('application', 'application.id', '=',  'eefapgv.application_id')
            ->where('application.barcode_number', $id)->where('application.application_status', '=', 'Pending')->orwhere('application.application_status', '=', 'Authenticating')
            ->select(DB::raw("CONCAT_WS('', eefapgv.surname,', ', eefapgv.first_name, ' ', eefapgv.middle_name, ' ', eefapgv.suffix) as fullname"), 
            DB::raw("CONCAT_WS('', eefapgv.street, ' ', eefapgv.barangay, ' ' , eefapgv.municipality ) as fulladdress"), 'eefapgv.mobile_number')->first();
        }

        else if($type == "pcl")
        {
            $users = DB::table('pcl')
            ->Join('application', 'application.id', '=',  'pcl.application_id')
            ->where('application.barcode_number', $id)->where('application.application_status', '=', 'Pending')->orwhere('application.application_status', '=', 'Authenticating')
            ->select(DB::raw("CONCAT_WS('', pcl.surname,', ', pcl.first_name, ' ', pcl.middle_name, ' ', pcl.suffix) as fullname"), 
            DB::raw("CONCAT_WS('', pcl.street, ' ', pcl.barangay, ' ' , pcl.municipality ) as fulladdress"), 'pcl.mobile_number')->first();
        }

         $output = array(
            'name'   =>$users->fullname,
            'type'  => $scholar->type,
            'scholarship'      =>$scholar->scholarship_name,
            'address' =>   $users->fulladdress,
            'aid' => $scholar->id,
            'mobile_number' => $users->mobile_number,
            'sc_id' => $scholar->sc_id,
            'applicant_id' => $scholar->applicant_id
        );
        echo json_encode($output);
    }

    function approved(Request $request)
    {  
        if($request->get('action') == 'approved')
        {
            $id = $request->get('aid');
            $approve =  'Approved';
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
            'employee_id' => '0'

            ]);

            return redirect('/approve');

        }
        else if ($request->get('action') == 'disapproved')
        {
            $id = $request->get('aid');
            $approve =  'Disapproved';
            DB::table('application')->where('id', $id)
            ->update([
                'application_status' => $approve
            ]);

            // $approval = DB::table('approval_date')->insert([
            // 'status' => $approve,
            // 'application_id' => $id,
            // 'date_approved' => date('Y-m-d'),
            // 'applicant_id' => $request->get('applicant_id'),
            // 'scholarship_id' => $request->get('sc_id'),
            // 'employee_id' => '0'

            // ]);

            return redirect('/approve');
        }

    }

    function listapproved()
    {   
        $stat = "Approved";
        $approve = DB::table('approval_date')
        ->Join('users', 'users.id', '=',  'approval_date.applicant_id')
        ->Join('scholarships', 'scholarships.id', '=',  'approval_date.scholarship_id')
        ->where('approval_date.status', $stat)
        ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'scholarships.scholarship_name', 'approval_date.date_approved' )->get();
        return DataTables::of($approve)
        ->addColumn('action', function($approve){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$approve->fullname.'"><i class="fa fa-edit"></i>Apply</a>';
        })
        ->make(true);
    }

    function admindash()
    {
        return view('admin.admindash');
    }
}
