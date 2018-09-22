<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Scholarship;
use DataTables;
use App\Tracking;
use Itexmo;
use App\User;
use Auth;
use Mail;
use App\Mail\Awarding;
class TrackingController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    
    function viewTrack()
    {
         $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return view('admin.tracking.show')->with('role', $role);
    }



    function getdata()
    {
        $scholarships = DB::table('tracking')->Join('scholarships', 'scholarships.id', '=', 'tracking.scholarship_id')->select('tracking.id','scholarships.scholarship_name', 'tracking.stage')
        ->where('scholarships.status', 'CLOSED')->where('tracking.status', '!=', 'RELEASED')->get();
        return DataTables::of($scholarships)

        ->addColumn('action', function($scholarships){
                       
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$scholarships->id.'"><i class="fa fa-edit"></i> Update</a>';
                
            
        })
        ->make(true);

    }
    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $tracking = Tracking::find($id);
        $output = array(
            'stage'    =>  $tracking->stage,
            'status'     =>  $tracking->status
            // 'amount'              =>   $scholarship->amount,
            // 'deadline'             => $scholarship->deadline,
            // 'slot'                => $scholarship->slot,
            // 'status'               =>$scholarship->status
        );
        echo json_encode($output);
        //eval ($goback);
    }

    function postdata(Request $request)
    {
        
         $validation = Validator::make($request->all(), [
            'scholarship_id' => 'required',
            'status'  => 'required',
            // 'amount'            => 'required',
            // 'deadline'         => 'required',
            // 'slot'            => 'required',
            //'status'          => 'required'
        
        ]);
        $error_array = array();
        $success_output = '';
        
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {

            if($request->get('button_action') == 'update')
            {
                $track = Tracking::find($request->get('scholarship_id'));
                $track->stage = $request->get('status');
                $track->save();
                $success_output = '<div class="alert alert-success">Success!</div>';
                
                $stat =  $request->get('status');
                
                if($stat == 'Approved')
                {
                    $log = DB::table('log')->insert([
                        'desc' => 'Your application has been approved.',
                        'scholar_id' => $request->get('scholarship_id'),
                        'tracking_id' => $request->get('scholarship_id'),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
                else if($stat == 'Re-Checking')
                {
                    $log = DB::table('log')->insert([
                        'desc' => 'Your application is being re-check.',
                        'scholar_id' => $request->get('scholarship_id'),
                        'tracking_id' => $request->get('scholarship_id'),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
                else if($stat == 'Consolidation')
                {
                    $log = DB::table('log')->insert([
                        'desc' => 'Your application is being consolidate to ensure that there are no duplicate entry.',
                        'scholar_id' => $request->get('scholarship_id'),
                        'tracking_id' => $request->get('scholarship_id'),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
                else if($stat == 'Payroll')
                {
                    $log = DB::table('log')->insert([
                        'desc' => 'Printing of cheques.',
                        'scholar_id' => $request->get('scholarship_id'),
                        'tracking_id' => $request->get('scholarship_id'),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
                else if($stat == 'Awarding')
                {
                    $log = DB::table('log')->insert([
                        'desc' => 'Releasing of Cheques',
                        'scholar_id' => $request->get('scholarship_id'),
                        'tracking_id' => $request->get('scholarship_id'),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);

                    // $track = Tracking::find($request->get('scholarship_id'));
                    // $track->status = 'RELEASED';
                    // $track->save();

                    
                    
                    $scid = $request->get('scholarship_id');
                    $scholar = DB::table('scholarships')->where('id', $scid)->first();
                        
                    $app2 = DB::table('application')->get();
                    
                    $user = DB::table('users')->get();
                    
                    if($scholar->type == "eefap-gv")
                    {
                        $track = Tracking::find($request->get('scholarship_id'));
                        $track->status = "Success";
                        $track->save();
                    }
                        
                   


            }
        }
            else if($request->get('button_action') == 'close')
            {
                return 'ERROR!';
            }
            
    
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
        //eval ($goback);
    }
}

}
