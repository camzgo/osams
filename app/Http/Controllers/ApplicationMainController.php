<?php

namespace App\Http\Controllers;

use DataTables;
use Validator;
use DB;
use Illuminate\Http\Request;
use App\Application;
use Auth;

class ApplicationMainController extends Controller
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
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();

        return view ('admin.file_maintenance.application.show')->with('role', $role);
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
        $pending = 'Pending';
        $users = DB::table('application')
            ->Join('users', 'application.applicant_id', '=', 'users.id')
            ->Join('scholarships', 'application.scholar_id', '=', 'scholarships.id')
            ->where('application.application_status', $pending)
            ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'application.id', 'users.email', 'application.created_at', 'scholarships.id as scid', 'scholarships.scholarship_name')->get();
            return DataTables::of($users)
            ->addColumn('action', function($users){
                return '<a href="/admin/application/details/'.$users->id.'/'.$users->scid.'" class="btn btn-sm btn-success edit " id="'.$users->id.'"><i class="fa fa-eye"></i> View</a>
                <a href="#" class="btn btn-sm btn-danger delete " id="'.$users->id.'"><i class="fa fa-trash"></i> Delete</a>';
            })
            ->make(true);

    }

    function getdata2()
    {
        $pending = 'Approved';
        $users = DB::table('application')
            ->Join('users', 'application.applicant_id', '=', 'users.id')
            ->Join('scholarships', 'application.scholar_id', '=', 'scholarships.id')
            ->Join('approval_date', 'approval_date.application_id', '=', 'application.id')
            ->Join('admins', 'admins.id',  '=', 'approval_date.employee_id')
            ->where('application.application_status', $pending)
            ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 
            DB::raw("CONCAT_WS('', admins.surname,', ', admins.first_name, ' ', admins.middle_name, ' ', admins.suffix) as empfullname"), 
            'application.id', 'scholarships.id as scid', 'users.email', 'application.created_at', 'scholarships.scholarship_name', 'approval_date.date_approved')->get();
            return DataTables::of($users)
            ->addColumn('action', function($users){
                return '<a href="/admin/application/details/'.$users->id.'/'.$users->scid.'" class="btn btn-sm btn-success edit " id="'.$users->id.'"><i class="fa fa-eye"></i> View</a>
                <a href="#" class="btn btn-sm btn-danger delete " id="'.$users->id.'"><i class="fa fa-trash"></i> Delete</a>';
            })
            ->make(true);

    }

    function getdata3()
    {
        $pending = 'Renew';
        $users = DB::table('application')
            ->Join('users', 'application.applicant_id', '=', 'users.id')
            ->Join('scholarships', 'application.scholar_id', '=', 'scholarships.id')
            ->where('application.application_status', $pending)
            ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'application.id', 'users.email', 'application.created_at', 'scholarships.id as scid', 'scholarships.scholarship_name')->get();
            return DataTables::of($users)
            ->addColumn('action', function($users){
                return '<a href="/admin/application/details/'.$users->id.'/'.$users->scid.'" class="btn btn-sm btn-success edit " id="'.$users->id.'"><i class="fa fa-eye"></i> View</a>
                <a href="#" class="btn btn-sm btn-danger delete " id="'.$users->id.'"><i class="fa fa-trash"></i> Delete</a>';
            })
            ->make(true);

    }

    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $application = DB::table('application')->where('id', $id)->first();
        $output = array(
            'application_status'    =>  $application->application_status,
            'scholar_id'     =>  $application->scholar_id,
            'applicant_id' => $application->applicant_id
        );
        echo json_encode($output);
        //eval ($goback);
    }

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'app_status' => 'required',
            'app_id'  => 'required',
        ]);
        
        $error_array = array();
        $success_output = '';
        $def = 0;

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
                $app_del = "Disapproved";
                $application = Application::find($request->get('app_id'));
                $application->application_status = $app_del;
                // $faquestion->answer = $request->get('answer');
                $application->save();
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

    function scdetails($app, $scid)
    {

        $application = DB::table('application')->where('id', $app)->first();
        $scholar = DB::table('scholarships')->where('id', $scid)->first();

        if($scholar->type=="eefap")
        {
            $eefap = DB::table('eefap')->where('application_id', $app)->first();
            return view('admin.file_maintenance.application.details')->with('eefap', $eefap)->with('application', $application)->with('scholar', $scholar);
        }
        else if ($scholar->type == "eefap-gv")
        {
            $eefapgv = DB::table('eefapgv')->where('application_id', $app)->first();
            return view('admin.file_maintenance.application.details')->with('eefapgv', $eefapgv)->with('application', $application)->with('scholar', $scholar);
        }
        else if($scholar->type == "pcl")
        {
            $pcl = DB::table('pcl')->where('application_id', $app)->first();
            return view('admin.file_maintenance.application.details')->with('pcl', $pcl)->with('application', $application)->with('scholar', $scholar);   
        }


        
    }

}
