<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
// use App\Http\Controllers\DB;
// use App\Http\Controllers\Facades\DB;
use DataTables;
use Validator;
use Auth;
use DB;

class AnnounceMainController extends Controller
{

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

        return view('admin.file_maintenance.announcement.show')->with('role', $role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        return view('admin.file_maintenance.announcement.create')->with('role', $role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $ext = "none";
        $isdl = 0;

        $announce = new Announcement([
            'title'    =>  $request->get('title'),
            'body'     =>  $request->get('body'),
            'cover_photo' => $ext,
            'a_isdel'   => $isdl
        ]);
        $announce->save();

        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $audit = DB::table('audit_log')->insert([
            'a_date' => date('Y-m-d'),
            'a_time' => $time,
            'action' => 'Announcement Created',
            'employee_id' => Auth::user()->id
        ]);
        return redirect('/admin/announcement');
        // else
        // {
        //     $announce = new Announcement;
	    //     $announce -> title = $request->input('title');
	    //     $announce -> body = $request->input('body');
        //     $announce -> cover_photo = $ext;
        //     $announce -> a_isdel = $isdl;
        //     $announce -> save();
            
        //     return redirect('/announcement');
        // }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        $announce =  Announcement::find($id);
        return view('admin.file_maintenance.announcement.edit')->with('announce', $announce)->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $announce = Announcement::find($id);
        $announce -> title = $request->input('title');
        $announce -> body = $request->input('body');
        $announce->save();

        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $audit = DB::table('audit_log')->insert([
            'a_date' => date('Y-m-d'),
            'a_time' => $time,
            'action' => 'Announcement Updated',
            'employee_id' => Auth::user()->id
        ]);
        return redirect('/admin/announcement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function getdata()
    {
        //$ur = "{{action('AnnounceMainController@edit', $announce->id)}}";
        $announces = Announcement::select('id','title', 'body')->where('a_isdel', '0')->get();
        return DataTables::of($announces)
        ->addColumn('action', function($announces){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$announces->id.'"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$announces->id.'"><i class="fa fa-trash"></i> Delete</a> ';
        })
        // ->addColumn('checkbox', '<input type="checkbox" name="form_checkbox[]" class="form_checkbox" value="{{$id}}"/>')
        // ->rawColumns(['checkbox', 'action'])
        ->make(true);

    }
    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $announce = Announcement::find($id);
        $output = array(
            'title'    =>  $announce->title,
            'body'     =>  $announce->body,
            'cover_photo' => $announce->cover_photo,
            'a_isdel' => $announce->a_isdel
        );
        echo json_encode($output);
        //eval ($goback);
    }
    
    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'del_title' => 'required',
            'del_body'  => 'required',
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
                // $faquestion = new Faquestion([
                //     'question'    =>  $request->get('question'),
                //     'answer'     =>  $request->get('answer'),
                //     'faq_isdel' => $def
                // ]);
                // $faquestion->save();
                // $success_output = '';
            }

            else if($request->get('button_action') == 'delete')
            {
                $announce = Announcement::find($request->get('del_id'));
                $announce->title = $request->get('del_title');
                $announce->body = $request->get('del_body');
                //$announce->cover_photo = 'none';
                $announce->a_isdel = $request->get('del_isdel');
                $announce->save();
                $success_output = '';

                date_default_timezone_set("Asia/Manila");
                $time = date('h:i:s', strtotime(now()));
                $audit = DB::table('audit_log')->insert([
                'a_date' => date('Y-m-d'),
                'a_time' => $time,
                'action' => 'Announcement Archived',
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
}
