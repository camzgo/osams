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
use App\Mail\Awarding2;
use App\Application;
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
                    date_default_timezone_set("Asia/Manila");
                    $time = date('h:i:s', strtotime(now()));
                    $history = DB::table('history_log')->insert([
                        'action'  => 'Cheques Released',
                        'date'     => date('Y-m-d'),
                        'time'     =>$time,
                        'applicant_id' => $request->get('applicant_id')
                    ]);

                    date_default_timezone_set("Asia/Manila");
                    $time = date('h:i:s', strtotime(now()));
                    $history = DB::table('history_log')->insert([
                        'action'  => 'Application need to renew',
                        'date'     => date('Y-m-d'),
                        'time'     =>$time,
                        'applicant_id' => $request->get('applicant_id')
                    ]);

                    
                    $data;
                    $json;
                    $ctr;
                    $scid = $request->get('scholarship_id');
                    $scholar = DB::table('scholarships')->where('id', $scid)->first();
                    
                    if($scholar->type == "eefap-gv")
                    {
                      

                        $app2 = DB::table('application')->JOIN('users', 'users.id', '=', 'application.applicant_id')
                        ->JOIN('eefapgv', 'eefapgv.application_id', '=', 'application.id')
                        ->where('application.application_status', 'Approved')->select('users.email', 'users.mobile_number', 'users.surname',
                         'users.first_name', 'users.middle_name', 'users.suffix')->get();
                        $app2->where('application.scholar_id', $scid);

                        // $userss = DB::table('users')->get();
                        // $userss->where('id', $app2->applicant_id);

                        for($z=0; $z<=$ctr; $z++)
                        {
                            $req = DB::table('reqgv')->where('application_id', $json[$z]['id'])->update([
                                'biodata' => NULL,
                                'cor'  => NULL,
                                'or'    => NULL,
                                'grades' => NULL,
                                'brgy'   => NULL,
                                'oid'      => NULL,
                                'honor'   => NULL,
                                'biodata_sub' => "Not Submitted",
                                'cor_sub' => "Not Submitted",
                                'or_sub' => "Not Submitted",
                                'grades_sub' => "Not Submitted",
                                'brgy_sub' => "Not Submitted",
                                'oid_sub' => "Not Submitted",
                                'honor_sub' => "Not Submitted",
                                'submit'  => 0

                            ]);
                        }
                        
                        
                       // serialize($array)
                        //return Redirect::route('/send/sample');
                        $samp = $app2->toJson();

                        $json = json_decode($samp, true);
                        $ctr = count($json);
                        $ctr-=1;
                        
                        // $nos = array();
                        // $names = array();


                        // for($y=0; $y<=$ctr; $y++)
                        // {
                        //     $res = Itexmo::to('0'.$json[$y]['mobile_number'])->message('Hello '.$json[$y]['first_name'].' you have been awarded a scholarship!' )->send();
                        //     if($res == '0') {
                        //         //
                        //     }
                        // }

                        // $sec = DB::table('application')->where('scholar_id', $request->get('scholarship_id'))->get();
                        // $data = $sec->toJson();
                        // $secid = json_decode($data, true);
                        // $cal = count($secid);
                        // $cal-=1;

                        // for($z=0; $z<=$cal; $z++)
                        // {
                        //     // $apps= Application::find($secid[$z]['id']);
                        //     // $apps->application_status = "Renew";
                        //     // $apps->renew = 1;
                        //     // $apps->save(); 

                            
                        // }

                        $apps = DB::table('application')->where('application_status', 'Approved')->update([
                            'application_status' => 'Renew',
                            'renew'  => 1
                        ]);

                        $track = Tracking::find($request->get('scholarship_id'));
                        $track->status = "RELEASED";
                        $track->save();
                        
                        
                         

                        $emails = array();
                        for($x=0; $x<=$ctr; $x++)
                        {
                            array_push($emails, $json[$x]['email']);
                        }

                        Mail::send('emails.awarding', [], function($message) use ($emails)
                        {    
                            $message->to($emails)->subject('Awarding of Cheques');    
                        });
                        // var_dump( Mail:: failures());
                        // exit;


                    }
                    else if($scholar->type == "eefap")
                    {
                      

                        $app2 = DB::table('application')->JOIN('users', 'users.id', '=', 'application.applicant_id')
                        ->JOIN('eefap', 'eefap.application_id', '=', 'application.id')
                        ->where('application.application_status', 'Approved')->select('users.email', 'users.mobile_number', 'users.surname',
                         'users.first_name', 'users.middle_name', 'users.suffix')->get();
                        $app2->where('application.scholar_id', $scid);

                        // $userss = DB::table('users')->get();
                        // $userss->where('id', $app2->applicant_id);
                        
                        for($z=0; $z<=$ctr; $z++)
                        {
                            $req = DB::table('reqeefap')->where('application_id', $json[$z]['id'])->update([
                                'biodata' => NULL,
                                'cor'  => NULL,
                                'or'    => NULL,
                                'grades' => NULL,
                                'brgy'   => NULL,
                                'oid'      => NULL,
                                'biodata_sub' => "Not Submitted",
                                'cor_sub' => "Not Submitted",
                                'or_sub' => "Not Submitted",
                                'grades_sub' => "Not Submitted",
                                'brgy_sub' => "Not Submitted",
                                'oid_sub' => "Not Submitted",
                                'submit'  => 0

                            ]);
                        }

                        
                        
                       // serialize($array)
                        //return Redirect::route('/send/sample');
                        $samp = $app2->toJson();

                        $json = json_decode($samp, true);
                        $ctr = count($json);
                        $ctr-=1;
                        
                        // $nos = array();
                        // $names = array();


                        // for($y=0; $y<=$ctr; $y++)
                        // {
                        //     $res = Itexmo::to('0'.$json[$y]['mobile_number'])->message('Hello '.$json[$y]['first_name'].' you have been awarded a scholarship!' )->send();
                        //     if($res == '0') {
                        //         //
                        //     }
                        // }

                        $apps = DB::table('application')->where('application_status', 'Approved')->update([
                            'application_status' => 'Renew',
                            'renew'  => 1
                        ]);

                        $track = Tracking::find($request->get('scholarship_id'));
                        $track->status = "RELEASED";
                        $track->save();
                        
                         

                        $emails = array();
                        for($x=0; $x<=$ctr; $x++)
                        {
                            array_push($emails, $json[$x]['email']);
                        }

                        Mail::send('emails.awarding', [], function($message) use ($emails)
                        {    
                            $message->to($emails)->subject('Awarding of Cheques');    
                        });
                        // var_dump( Mail:: failures());
                        // exit;


                    }
                    else if($scholar->type == "pcl")
                    {
                      

                        $app2 = DB::table('application')->JOIN('users', 'users.id', '=', 'application.applicant_id')
                        ->JOIN('pcl', 'pcl.application_id', '=', 'application.id')
                        ->where('application.application_status', 'Approved')->select('users.email', 'users.mobile_number', 'users.surname',
                         'users.first_name', 'users.middle_name', 'users.suffix', 'application.id')->get();
                        $app2->where('application.scholar_id', $scid);

                        // $userss = DB::table('users')->get();
                        // $userss->where('id', $app2->applicant_id);

                        
                        
                        
                       // serialize($array)
                        //return Redirect::route('/send/sample');
                        $samp = $app2->toJson();

                        $json = json_decode($samp, true);
                        $ctr = count($json);
                        $ctr-=1;

                        for($z=0; $z<=$ctr; $z++)
                        {
                            $req = DB::table('reqeefap')->where('application_id', $json[$z]['id'])->update([
                                'biodata' => NULL,
                                'cor'  => NULL,
                                'or'    => NULL,
                                'grades' => NULL,
                                'brgy'   => NULL,
                                'oid'      => NULL,
                                'biodata_sub' => "Not Submitted",
                                'cor_sub' => "Not Submitted",
                                'or_sub' => "Not Submitted",
                                'grades_sub' => "Not Submitted",
                                'brgy_sub' => "Not Submitted",
                                'oid_sub' => "Not Submitted",
                                'submit'  => 0

                            ]);
                        }


                        
                        // $nos = array();
                        // $names = array();


                        // for($y=0; $y<=$ctr; $y++)
                        // {
                        //     $res = Itexmo::to('0'.$json[$y]['mobile_number'])->message('Hello '.$json[$y]['first_name'].' you have been awarded a scholarship!' )->send();
                        //     if($res == '0') {
                        //         //
                        //     }
                        // }

                        $apps = DB::table('application')->where('application_status', 'Approved')->update([
                            'application_status' => 'Renew',
                            'renew'  => 1
                        ]);

                        $track = Tracking::find($request->get('scholarship_id'));
                        $track->status = "RELEASED";
                        $track->save();
                        
                         

                        $emails = array();
                        for($x=0; $x<=$ctr; $x++)
                        {
                            array_push($emails, $json[$x]['email']);
                        }

                        Mail::send('emails.awarding', [], function($message) use ($emails)
                        {    
                            $message->to($emails)->subject('Awarding of Cheques');    
                        });
                        // var_dump( Mail:: failures());
                        // exit;


                    }
            }
            // else
            // {

            // }
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
