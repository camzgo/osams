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

class AwardingController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
       $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return view('admin.transaction.awarding')->with('role', $role);
    }

    public function getdata()
    {
        $scholarships = DB::table('scholarships')->Join('application', 'application.scholar_id', '=', 'scholarships.id')->where('scholarships.status', 'CLOSED')
        ->where('application.application_status', 'Approved')->select('scholarships.scholarship_name', 'scholarships.status', 'scholarships.type', 'scholarships.id')->get();
        return DataTables::of($scholarships)
        ->addColumn('action', function($scholarships){
                       
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$scholarships->id.'"><i class="fa fa-trophy"></i> Award</a>';
                
            
        })
        ->make(true);

    }

    public function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $scholarship = DB::table('scholarships')->where('id', $id)->first();
        $output = array(
            'scholar_name'    =>  $scholarship->scholarship_name,
            'status'     =>  $scholarship->status,
            'scholar_type' => $scholarship->type,
            'sc_id'   =>$scholarship->id
            
        );
        echo json_encode($output);
        //eval ($goback);
    }

    public function postdata(Request $request)
    {
         $error_array = array();
         $success_output = '';
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

                   
                    
                    if($request->get('sc_type') == "eefap-gv")
                    {
                      

                        $app2 = DB::table('application')->JOIN('users', 'users.id', '=', 'application.applicant_id')
                        ->JOIN('eefapgv', 'eefapgv.application_id', '=', 'application.id')
                        ->where('application.application_status', 'Approved')->select('users.email', 'users.mobile_number', 'users.surname',
                         'users.first_name', 'users.middle_name', 'users.suffix', 'application.id', 'users.id as user_id')->get();
                        $app2->where('application.scholar_id', $request->get('sc_id'));

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

                            
                            date_default_timezone_set("Asia/Manila");
                            $time = date('h:i:s', strtotime(now()));
                            $history = DB::table('history_log')->insert([
                                'action'  => 'Cheques Released',
                                'date'     => date('Y-m-d'),
                                'time'     =>$time,
                                'applicant_id' => $json[$z]['user_id']
                            ]);

                            date_default_timezone_set("Asia/Manila");
                            $time = date('h:i:s', strtotime(now()));
                            $history = DB::table('history_log')->insert([
                                'action'  => 'Application need to renew',
                                'date'     => date('Y-m-d'),
                                'time'     =>$time,
                                'applicant_id' =>  $json[$z]['user_id'],
                                'scholar_id'  => $request->get('sc_id')
                            ]);

                            $log = DB::table('log')->insert([
                                'description' => 'Releasing of Cheques',
                                'scholar_id' => $request->get('sc_id'),
                                'applicant_id' => $json[$z]['user_id'],
                                'employee_id'  => Auth::user()->id,
                                'remarks'    => $request->get('remarks'),
                                'date' => date('Y-m-d'),
                                'time' => $time
                            ]);

                            $log = DB::table('log')->insert([
                                'description' => 'Application need to renew',
                                'scholar_id' => $request->get('sc_id'),
                                'applicant_id' => $json[$z]['user_id'],
                                'employee_id'  => Auth::user()->id,
                                'remarks'    => null,
                                'date' => date('Y-m-d'),
                                'time' => $time
                            ]);
                        }
                        
                        // $nos = array();
                        // $names = array();


                        for($y=0; $y<=$ctr; $y++)
                        {
                            $res = Itexmo::to('0'.$json[$y]['mobile_number'])->message('Hello '.$json[$y]['first_name'].' you have been awarded a scholarship!' )->send();
                            if($res == '0') {
                                //
                            }
                        }

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
                    else if($request->get('sc_type')  == "eefap")
                    {
                      

                        $app2 = DB::table('application')->JOIN('users', 'users.id', '=', 'application.applicant_id')
                        ->JOIN('eefap', 'eefap.application_id', '=', 'application.id')
                        ->where('application.application_status', 'Approved')->select('users.email', 'users.mobile_number', 'users.surname',
                         'users.first_name', 'users.middle_name', 'users.suffix', 'application.id', 'users.id as user_id')->get();
                        $app2->where('application.scholar_id', $request->get('sc_id'));

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

                            date_default_timezone_set("Asia/Manila");
                            $time = date('h:i:s', strtotime(now()));
                            $history = DB::table('history_log')->insert([
                                'action'  => 'Cheques Released',
                                'date'     => date('Y-m-d'),
                                'time'     =>$time,
                                'applicant_id' => $json[$z]['user_id']
                            ]);

                            date_default_timezone_set("Asia/Manila");
                            $time = date('h:i:s', strtotime(now()));
                            $history = DB::table('history_log')->insert([
                                'action'  => 'Application need to renew',
                                'date'     => date('Y-m-d'),
                                'time'     =>$time,
                                'applicant_id' =>  $json[$z]['user_id'],
                                'scholar_id'  => $request->get('sc_id')
                            ]);

                            $log = DB::table('log')->insert([
                                'description' => 'Releasing of Cheques',
                                'scholar_id' => $request->get('sc_id'),
                                'applicant_id' => $json[$z]['user_id'],
                                'employee_id'  => Auth::user()->id,
                                'remarks'    => $request->get('remarks'),
                                'date' => date('Y-m-d'),
                                'time' => $time
                            ]);

                            $log = DB::table('log')->insert([
                                'description' => 'Application need to renew',
                                'scholar_id' => $request->get('sc_id'),
                                'applicant_id' => $json[$z]['user_id'],
                                'employee_id'  => Auth::user()->id,
                                'remarks'    => null,
                                'date' => date('Y-m-d'),
                                'time' => $time
                            ]);
                        }

                        
                        // $nos = array();
                        // $names = array();


                        for($y=0; $y<=$ctr; $y++)
                        {
                            $res = Itexmo::to('0'.$json[$y]['mobile_number'])->message('Hello '.$json[$y]['first_name'].' you have been awarded a scholarship!' )->send();
                            if($res == '0') {
                                //
                            }
                        }

                        $apps = DB::table('application')->where('application_status', 'Approved')->update([
                            'application_status' => 'Renew',
                            'renew'  => 1
                        ]);

                        
                         

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
                    else if($request->get('sc_type')  == "pcl")
                    {
                      

                        $app2 = DB::table('application')->JOIN('users', 'users.id', '=', 'application.applicant_id')
                        ->JOIN('pcl', 'pcl.application_id', '=', 'application.id')
                        ->where('application.application_status', 'Approved')->select('users.email', 'users.mobile_number', 'users.surname',
                         'users.first_name', 'users.middle_name', 'users.suffix', 'application.id', 'users.id as user_id')->get();
                        $app2->where('application.scholar_id', $request->get('sc_id'));

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

                            date_default_timezone_set("Asia/Manila");
                            $time = date('h:i:s', strtotime(now()));
                            $history = DB::table('history_log')->insert([
                                'action'  => 'Cheques Released',
                                'date'     => date('Y-m-d'),
                                'time'     =>$time,
                                'applicant_id' => $json[$z]['user_id']
                            ]);

                            date_default_timezone_set("Asia/Manila");
                            $time = date('h:i:s', strtotime(now()));
                            $history = DB::table('history_log')->insert([
                                'action'  => 'Application need to renew',
                                'date'     => date('Y-m-d'),
                                'time'     =>$time,
                                'applicant_id' =>  $json[$z]['user_id'],
                                'scholar_id'  => $request->get('sc_id')
                            ]);

                            $log = DB::table('log')->insert([
                                'description' => 'Releasing of Cheques',
                                'scholar_id' => $request->get('sc_id'),
                                'applicant_id' => $json[$z]['user_id'],
                                'employee_id'  => Auth::user()->id,
                                'remarks'    => $request->get('remarks'),
                                'date' => date('Y-m-d'),
                                'time' => $time
                            ]);

                            $log = DB::table('log')->insert([
                                'description' => 'Application need to renew',
                                'scholar_id' => $request->get('sc_id'),
                                'applicant_id' => $json[$z]['user_id'],
                                'employee_id'  => Auth::user()->id,
                                'remarks'    => null,
                                'date' => date('Y-m-d'),
                                'time' => $time
                            ]);
                        }


                        
                        // $nos = array();
                        // $names = array();


                        for($y=0; $y<=$ctr; $y++)
                        {
                            $res = Itexmo::to('0'.$json[$y]['mobile_number'])->message('Hello '.$json[$y]['first_name'].' you have been awarded a scholarship!' )->send();
                            if($res == '0') {
                                //
                            }
                        }

                        $apps = DB::table('application')->where('application_status', 'Approved')->update([
                            'application_status' => 'Renew',
                            'renew'  => 1
                        ]);
                        
                         

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

                    date_default_timezone_set("Asia/Manila");
                    $time = date('h:i:s', strtotime(now()));
                    $audit = DB::table('audit_log')->insert([
                    'date' => date('Y-m-d'),
                    'time' => $time,
                    'action' => 'Scholarship Awarded',
                    'employee_id' => Auth::user()->id
                    ]);

                    $output = array(
                    'error'     =>  $error_array,
                    'success'   =>  $success_output
                     );
                echo json_encode($output);
    
    }
}       
