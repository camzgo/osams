<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Scholarship;
use DataTables;
use App\Tracking;
use Auth;
use App\Application;

class ScholarshipMainController extends Controller
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
        return view('admin.file_maintenance.scholar.show')->with('role', $role);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

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
        $scholarships = Scholarship::select('id','scholarship_name', 'scholarship_desc', 'amount', DB::raw("DATE_FORMAT(deadline, '%W, %d %M %Y') as deadline"), 'slot', 'status', 'supplement')->orderByRaw('id', 'DESC');
        return DataTables::of($scholarships)

        ->addColumn('action', function($scholarships){
            $date = $scholarships->deadline;
            $date2 = date("Y-m-d");
            //$scholar2 = DB::table('scholarships')->where('id',  $scholarships->id)->first();
            $scholar = DB::table('scholarships')->join('application', 'application.scholar_id', '=', 'scholarships.id')->where('scholarships.id',  $scholarships->id)->count();
            $sr = $scholarships->slot + $scholarships->supplement;

            if($scholarships->status=="OPEN")
            {
                return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$scholarships->id.'"><i class="fa fa-edit"></i> Edit</a>
                     <a href="#" class="btn btn-sm btn-danger delete" id="'.$scholarships->id.'"><i class="fa fa-close"></i> Closed</a>';
            }
            else
            {
               if($date >= $date2)
               {
                   if($sr != $scholar)
                   {
                        return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$scholarships->id.'"><i class="fa fa-edit"></i> Edit</a>
                        <a href="#" class="btn btn-sm btn-success delete" id="'.$scholarships->id.'"><i class="fa fa-check"></i> Open</a>';
                   }
                   else
                   {
                        return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$scholarships->id.'"><i class="fa fa-edit"></i> Edit</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-secondary" id="'.$scholarships->id.'"><i class="fa fa-check"></i> Open</a>
                        <p><span class="badge badge-warning text-white mt-2"> <strong>No more slots. </strong> <br>Slots and Supplement has reached.</span></p>';
                   }
                    
               }
               else
               {
                    return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$scholarships->id.'"><i class="fa fa-edit"></i> Edit</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary" id="'.$scholarships->id.'"><i class="fa fa-check"></i> Open</a>';
               }

             
            }
            
        })
        ->addColumn('badge', function($scholarships){
            // return '<button class="btn btn-primary" >'.$scholarships->status.'</button>';
            if($scholarships->status=="OPEN")
            {
                return '<h4><span class="badge badge-success">'.$scholarships->status.'</span></h4>';
            }
            else
            {
                return '<h4><span class="badge badge-danger">'.$scholarships->status.'</span></h4>';
            }
            
        })
        
        // ->addColumn('checkbox', '<input type="checkbox" name="student_checkbox[]" class="student_checkbox" value="{{$id}}"/>')
        // ->rawColumns(['checkbox', 'action'])
        ->rawColumns(['badge', 'action'])
        ->make(true);

    }
    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $scholarship = Scholarship::find($id);
        $output = array(
            'scholarship_name'    =>  $scholarship->scholarship_name,
            'scholarship_desc'     =>  $scholarship->scholarship_desc,
            'amount'              =>   $scholarship->amount,
            'deadline'             => $scholarship->deadline,
            'slot'                => $scholarship->slot,
            'status'               =>$scholarship->status,
            'supplement'           =>$scholarship->supplement
        );
        echo json_encode($output);
        //eval ($goback);
    }

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'scholarship_name' => 'required',
            'scholarship_desc'  => 'required',
            'amount'            => 'required',
            'deadline'         => 'required',
            'slot'            => 'required',
            'supp'             => 'required'
            //'status'          => 'required'
        
        ]);
        
    //     protected $rules =
    // [
    //     'title' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
    //     'content' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'
    // ];

        $error_array = array();
        $success_output = '';
        $refresh = "return redirect('/scholarship');";
        
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
                $scholarship = Scholarship::find($request->get('scholarship_id'));
                $scholarship->scholarship_name = $request->get('scholarship_name');
                $scholarship->scholarship_desc = $request->get('scholarship_desc');
                $scholarship->amount = $request->get('amount');
                $scholarship->deadline =$request->get('deadline');
                $scholarship->slot = $request->get('slot');
                $scholarship->supplement = $request->get('supp');
                $scholarship->save();

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                    'a_date' => date('Y-m-d'),
                    'a_time' => $time,
                    'action' => 'Scholarship Updated',
                    'employee_id' => Auth::user()->id
                ]);

                $success_output = '<div class="alert alert-success">Success!</div>';

            }
            if($request->get('button_action') == 'close')
            {
                $scholarship = Scholarship::find($request->get('scholarship_id'));
                $scholarship->scholarship_name = $request->get('scholarship_name');
                $scholarship->scholarship_desc = $request->get('scholarship_desc');
                $scholarship->amount = $request->get('amount');
                $scholarship->deadline =$request->get('deadline');
                $scholarship->slot = $request->get('slot');
                $scholarship->supplement = $request->get('supp');
                $scholarship->status = $request->get('status');
                $scholarship->save();
                $success_output = '<div class="alert alert-success">Success!</div>';
                
               
                if($request->get('status') == "OPEN")
                {

                   // $log = DB::table('log')->where('scholar_id', $request->get('scholarship_id'))->delete();

                    date_default_timezone_set("Asia/Manila");
                    $time = date('h:i:s', strtotime(now()));
                    $audit = DB::table('audit_log')->insert([
                        'a_date' => date('Y-m-d'),
                        'a_time' => $time,
                        'action' => 'Scholarship Opened',
                        'employee_id' => Auth::user()->id
                    ]);
                }

                else if($request->get('status') == "CLOSED")
                {

                    $scholar_id = DB::table('tracking')->where('scholarship_id', $request->get('scholarship_id'))->first();
                    $tr_id =$scholar_id->id;
                    $tracking = Tracking::find($tr_id);
                    $tracking->stage ="Approved";
                    $tracking->status = "CLOSED";
                    $tracking->save();

  

                    date_default_timezone_set("Asia/Manila");
                    $time = date('h:i:s', strtotime(now()));
                    
                    $log = DB::table('log')->insert([
                        'description' => 'Your application has been pre-approved and being re-check.',
                        'scholar_id' => $request->get('scholarship_id'),
                        'applicant_id' => $request->get('applicant_id'),
                        'employee_id'  => Auth::user()->id,
                        'remarks'    => $request->get('remarks'),
                        'date' => date('Y-m-d'),
                        'time' => $time
                    ]);


                    date_default_timezone_set("Asia/Manila");
                    $time = date('h:i:s', strtotime(now()));
                    $audit = DB::table('audit_log')->insert([
                        'a_date' => date('Y-m-d'),
                        'a_time' => $time,
                        'action' => 'Scholarship Closed',
                        'employee_id' => Auth::user()->id
                    ]);

                    $delapp = DB::table('application')->where('application_status', 'Pending')->where('application_status', 'Renew')->where('scholar_id', $request->get('scholarship_id'))->get();
                    $arr=$delapp->toJson();

                    $json = json_decode($arr, true);

                    $ctr = count($json);
                    $ctr-=1;
                    for($x = 0; $x<=$ctr; $x++)
                    {
                        $app = Application::find($json[$x]['id'])->delete();
                    }

                    // $sc =DB::table('scholarships')->where('id', $request->get('scholarship_id'))->first();

                    // if($sc->type=="eefap")
                    // {
                    //     $req = DB::table('reqeefap')->JOIN('application', 'application.id', '=', 'reqeefap.applicant_id')->where('scholar_id', $request->get('scholarship_id'))->where('application.application_status', 'Pending')
                    //     ->where('application.application_status', 'Renew')->delete();
                    // }
                    // else if($sc->type == "eefap-gv")
                    // {
                    //     if($sc->id == 7)
                    //     {
                    //         $req = DB::table('reqeefap')->JOIN('application', 'application.id', '=', 'reqeefap.applicant_id')->where('scholar_id', $request->get('scholarship_id'))->where('application.application_status', 'Pending')
                    //         ->where('application.application_status', 'Renew')->delete();
                    //     }
                    //     else
                    //     {
                    //         $req = DB::table('reqgv')->JOIN('application', 'application.id', '=', 'reqeefap.applicant_id')->where('scholar_id', $request->get('scholarship_id'))->where('application.application_status', 'Pending')
                    //         ->where('application.application_status', 'Renew')->delete();
                    //     }
                    // }
                    // else if($sc->type == "pcl")
                    // {
                    //    $req = DB::table('reqeefap')->JOIN('application', 'application.id', '=', 'reqeefap.applicant_id')->where('scholar_id', $request->get('scholarship_id'))->where('application.application_status', 'Pending')
                    //     ->where('application.application_status', 'Renew')->delete();
                    // }


                    
                }
                
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
        $scholarship = Scholarship::find($request->get('del_id'));
        $scholarship->status = $request->get('status');
        $scholarship->save();
    }
    function getstat(Request $request)
    {
        $id = $request->input('id');
        $scholarship = Scholarship::find($id);
        $output = array(
            'scholarship_name'    =>  $scholarship->scholarship_name,
            'scholarship_desc'     =>  $scholarship->scholarship_desc,
            'amount'              =>   $scholarship->amount,
            'deadline'             => $scholarship->deadline,
            'slot'                => $scholarship->slot,
            'status'               =>$scholarship->status
        );
        echo json_encode($output);
    }
}
