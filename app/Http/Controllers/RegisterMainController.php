<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Facades\DB;

class RegisterMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.transaction.register');
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
            'middlename' => 'required',
            'email' => 'required',
            'bday' => 'required',
            'gender' => 'required|between:M,F',
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


        //create post

        $user = new User;
        $user -> surname = $request->input('surname');
        $user -> first_name = $request->input('first_name');
        $user -> middle_name = $request->input('middlename');
        $user -> email = $request->input('email');
        $user -> gender = $request->input('gender');
        $user -> bday = $request->input('bday');
        $user -> applicant_isdel = 0;
        $user -> save();



        // $post = new Post;
        // $post -> title = $request->input('title');
        // $post -> body = $request->input('body');
        // $post -> user_id = auth()->user()->id;
        // $post -> cover_image = $fileNameToStore;
        // $post -> save();

        return redirect('/faqs');
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
        return view ('admin.transaction.regsuccess');
    }
}
