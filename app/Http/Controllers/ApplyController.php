<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Scholarship;
use DataTables;
// use App\Http\Controllers\Facades\DB;
use Illuminate\Support\Facades\DB;
use Validator;

class ApplyController extends Controller
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

        return view ('admin.transaction.apply')->with('role', $role);
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

    function showCat()
    {
        return view ('admin.transaction.applycat');
    }

    function showsend()
    {
         return view ('admin.scholarships.application');
    }
    function getdata()
    {
        //$users = User::select('id', 'surname', 'first_name', 'middle_name');
        // $users = User::select("id", "email", 
        // DB::raw("CONCAT(users.surname,', ',users.first_name, ' ', users.middle_name) as fullname"))->where('applicant_isdel', '0')->get();

        $users = DB::table('users')
        ->leftJoin('application', 'application.applicant_id', '=', 'users.id')
        ->whereNull('application.applicant_id')
        //->where(DB::raw("application.applicant_id IS NULL"))
        ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'users.id', 'users.email')->get();
        return DataTables::of($users)
        ->addColumn('action', function($users){
            return '<a href="#" class="btn btn-sm btn-primary edit " id="'.$users->id.'"><i class="fa fa-paper-plane"></i> Apply</a>';
        })
        ->make(true);
    }

    function applydata()
    {
         $users = DB::table('users')
        ->join('application', 'application.applicant_id', '=', 'users.id')
        ->select(DB::raw("CONCAT_WS('', users.surname,', ', users.first_name, ' ', users.middle_name, ' ', users.suffix) as fullname"), 'users.id', 'users.email')->get();
        return DataTables::of($users)
        ->addColumn('action', function($users){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$users->id.'"><i class="fa fa-edit"></i>Apply</a>';
        })
        ->make(true);
    }

    function scholardata()
    {
        $scholarships = Scholarship::select('id','scholarship_name', 'scholarship_desc', 'amount', 'deadline', 'slot', 'status', 'type');
        return DataTables::of($scholarships)

        ->addColumn('action', function($scholarships){
            if($scholarships->status=="OPEN")
            {
                if($scholarships->type=="eefap")
                {
                    //return '<a href="/apply/scholarship-category/eefap/'.$scholarships->id.'" class="btn btn-sm btn-warning edit dt" id="'.$scholarships->id.'" name="btn-apply"><i class="fa fa-folder"></i> Choose</a>';
                    
                    $name = $scholarships->scholarship_name;
                    switch ($scholarships->scholarship_name)
                    {
                        case "NCW" :
                        return '<a href="#" class="btn btn-sm btn-warning  ncw " id="ncw" name="btn-apply"><i class="fa fa-paper-plane"></i> Choose</a>';
                        break;

                        case "GAD" :
                        return '<a href="#" class="btn btn-sm btn-warning gad" id="gad" name="btn-apply"><i class="fa fa-paper-plane"></i> Choose</a>';
                        break;

                        case  "VG OLD and NEW" :
                        return '<a href="#" class="btn btn-sm btn-warning  oldnew" id="oldnew" name="btn-apply"><i class="fa fa-paper-plane"></i> Choose</a>';
                        break;

                        case "GRADUATE FROM PUBLIC" :
                        return '<a href="#" class="btn btn-sm btn-warning  public" id="public" name="btn-apply"><i class="fa fa-paper-plane"></i> Choose</a>';
                        break;

                        case "GRADUATE FROM PRIVATE" :
                        return '<a href="#" class="btn btn-sm btn-warning  private" id="private" name="btn-apply"><i class="fa fa-paper-plane"></i> Choose</a>';
                        break;

                        default:
                        echo 'buguk';
                    }
                }

                else if ($scholarships->type=="eefap-gv")
                {
                    //return '<a href="/apply/scholarship-category/eefap-gv/'.$scholarships->id.'" class="btn btn-sm btn-warning  dt" id="'.$scholarships->id.'" name="btn-apply"><i class="fa fa-folder"></i> Choose</a>';
                
                    $name = $scholarships->scholarship_name;
                    switch ($scholarships->scholarship_name)
                    {
                        case "VG DHVTSU" :
                        return '<a href="#" class="btn btn-sm btn-warning  dhvtsu " id="dhvtsu"><i class="fa fa-paper-plane"></i> Choose</a>';
                        break;

                        case "HONORS and RANKS" :
                        return '<a href="#" class="btn btn-sm btn-warning  honors " id="honors"><i class="fa fa-paper-plane"></i> Choose</a>';
                        break;
                    }

                }
                else if ($scholarships->type=="pcl")
                {
                   return '<a href="#" class="btn btn-sm btn-warning  pcl" id="pcl"><i class="fa fa-paper-plane"></i> Choose</a>';
                }
                
               
            }
            else if ($scholarships->status=="CLOSED")
            {
                return '<a href="#" class="btn btn-sm btn-secondary edit" id="'.$scholarships->id.'"><i class="fa fa-paper-plane"></i> Choose</a>';
            }
            
        })
        ->make(true);
    }

    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $faquestion = Faquestion::find($id);
        $output = array(
            'question'    =>  $faquestion->question,
            'answer'     =>  $faquestion->answer
        );
        echo json_encode($output);
        //eval ($goback);
    }

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'question' => 'required',
            'answer'  => 'required',
        ]);
        
        $error_array = array();
        $success_output = '';
        $def = 0;
        $refresh = "return redirect('/faqs');";
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == 'insert')
            {
                $faquestion = new Faquestion([
                    'question'    =>  $request->get('question'),
                    'answer'     =>  $request->get('answer'),
                    'faq_isdel' => $def
                ]);
                $faquestion->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {
                $faquestion = Faquestion::find($request->get('faq_id'));
                $faquestion->question = $request->get('question');
                $faquestion->answer = $request->get('answer');
                $faquestion->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';

            }
            
        }
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
        //eval ($goback);
    }
}
