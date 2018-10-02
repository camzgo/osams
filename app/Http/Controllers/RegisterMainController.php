<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;


class RegisterMainController extends Controller
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
        return view('admin.transaction.register')->with('role', $role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
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
        $this -> validate($request, [
            'surname' => 'required',
            'first_name' => 'required',
            'middlename' => 'nullable',
            'email' => 'required',
            'bday' => 'required',
            'gender' => 'required|between:Male,Female',
            // 'cover_image' => 'image|nullable|max:1999'
        ]);	
        
        //Handle file upload
        // if($request->hasFile('cover_image'))
        // {
        //     //Get filename with extension
        //     $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //     //Get just file
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     //Get just extension
        //     $extension = $request->file('cover_image')->getClientOriginalExtension();
        //     //Filename to store
        //     $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //     //Upload image 
        //     $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        // }
        // else
        // {
        //      $fileNameToStore = 'noimage.jpg';
        // }

        
         //Get filename with extension
            // $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // //Get just file
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // //Get just extension
            // $extension = $request->file('cover_image')->getClientOriginalExtension();
            // //Filename to store
            // $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // //Upload image 
            // $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        //create post

        $user = new User;
        $user->surname = $request->input('surname');
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middlename');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->bday = $request->input('bday');
        $user->applicant_isdel = 0;
        $user->profile_photo = "noimage.jpg";
        $user->chg = 1;
        $user->new =1;
        $user -> save();



        // $post = new Post;
        // $post -> title = $request->input('title');
        // $post -> body = $request->input('body');
        // $post -> user_id = auth()->user()->id;
        // $post -> cover_image = $fileNameToStore;
        // $post -> save();

        return redirect('/admin/applicant');
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

    function send() 
    {

        $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        return view ('admin.transaction.regsuccess')->with('role', $role);
    }
}
