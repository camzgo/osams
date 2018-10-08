<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use DataTables;
use App\Application;
use Auth;

class ApplicationArchiveController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        return view ('admin.archive.application.show')->with('role', $role);
    }


    function getdata()
    {
        $pending = 'Disapproved';
        $users = DB::table('application')
            ->Join('users', 'application.applicant_id', '=', 'users.id')
            ->Join('scholarships', 'application.scholar_id', '=', 'scholarships.id')
            ->where('application.application_status', $pending)
            ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'application.id', 'users.email', 'application.created_at', 'scholarships.scholarship_name')->get();
            return DataTables::of($users)
            ->addColumn('action', function($users){
                return '<a href="#" class="btn btn-sm btn-success edit" id="'.$users->id.'"><i class="fa fa-refresh"></i> Restore</a>
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
            
            if($request->get('button_action') == 'update')
            {
                // $app_id = $request->get('app_id');
                // $approval = DB::table('approval_date')
                // ->leftjoin('application', 'application.applicant_id', '=', 'approval_date.applicant_id')
                // ->whereNotNull('application.id')
                // ->where('application.id', $app_id)
                // ->select('approval_date.status')->first();


                $app_del = "Pending";
                $application = Application::find($request->get('app_id'));
                $application->application_status = $app_del;
                $application->save();
                $success_output = '';

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                'date' => date('Y-m-d'),
                'time' => $time,
                'action' => 'Application Restored',
                'employee_id' => Auth::user()->id
                ]);

            }
            else if($request->get('button_action') == 'delete')
            {
                $app_del = "Disapproved";
                $application = Application::find($request->get('app_id'));
                $application->application_status = $app_del;
                $application->save();
                $success_output = '';

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                'date' => date('Y-m-d'),
                'time' => $time,
                'action' => 'Application Disapproved',
                'employee_id' => Auth::user()->id
                ]);
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

        $app_id = $request->input('id');
        $scholarship = DB::table('scholarships')
        ->join('application', 'application.scholar_id', '=', 'scholarships.id')
        ->where('application.id', $app_id)
        ->select('scholarships.type', 'scholarships.id')->first();

        // $applicant_id = DB::table('users')
        // ->join('application', 'application.applicant_id', '=', 'users.id')
        // ->where('application.id', $app_id)->select('users.id')->first();


        // $approval = DB::table('approval_date')
        // ->join('application', 'application.applicant_id', '=', 'approval_date.applicant_id')
        // ->where('application.id', $app_id)->select('approval_date.status')->first();

        $approval = DB::table('approval_date')
        ->where('application_id', $app_id)->delete();

        $sc_name = $scholarship->type;
        if ($sc_name == "eefap")
        {
            DB::table('eefap')->where('application_id', $app_id)->delete();
            $reqe = DB::table('reqeefap')->where('application_id', $app_id) ->delete();
        }

        else if ($sc_name == "eefap-gv")
        {
            DB::table('eefapgv')->where('application_id', $app_id)->delete();

            if($scholarship->id == 7)
            {
                $reqe = DB::table('reqeefap')->where('application_id', $app_id) ->delete();;
            }
            else
            {
                $reqgv = DB::table('reqgv')->where('application_id', $app_id) ->delete();
            }
        }

        else if ($sc_name == "pcl")
        {
            DB::table('pcl')->where('application_id', $app_id)->delete();
            $reqe = DB::table('reqeefap')->where('application_id', $app_id) ->delete();
        }

        $application = Application::find($request->input('id'));
        if($application->delete())
        {
            date_default_timezone_set("Asia/Manila");
            $time = date('h:i:s', strtotime(now()));
            $audit = DB::table('audit_log')->insert([
            'date' => date('Y-m-d'),
            'time' => $time,
            'action' => 'Application Deleted',
            'employee_id' => Auth::user()->id
            ]);
            echo 'It was successfully deleted!';
        }
    }
}
