<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\View;
use DB;
use App\Scholarship;
use App\User;
use App\Municipality;
use Auth;




class ScholarshipFrontController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function gadShow()
    {
        // return view ('admin.scholarships.eefap');

       // return view ('admin.scholarships.eefap-3');
        
    
        // $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        // return  view ('eefap')->with('municipal_list', $municipal_list);
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
       // return $randomString;
        $barcode = $randomString;
        $scholar_name = "GAD";

        // $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        // $scholar1 = str_replace("{", '', $scholars);
        // $scholar2 = str_replace("}", '', $scholar1);
        // $scholar3 = str_replace("\"id\":", '', $scholar2);
        // $scholar_id = $scholar3;
        $scholar = DB::table('scholarships')->where('scholarship_name', $scholar_name)->first();
        $scholar_id = $scholar->id;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $personal = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();
        return  view ('scholarship.eefap')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('barcode', $barcode)->with('personal', $personal)->with('education', $education)->with('guardian', $guardian);

        // return view ('admin.file_maintenance.users.create-step-2');
    }


    public function gradprivate()
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $barcode = $randomString;
        $scholar_name = "GRADUATE FROM PRIVATE";
        $scholar = DB::table('scholarships')->where('scholarship_name', $scholar_name)->first();
        $scholar_id = $scholar->id;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $personal = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();
        return  view ('scholarship.eefap')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('barcode', $barcode)->with('personal', $personal)->with('education', $education)->with('guardian', $guardian);
    }

    public function gradpublic()
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $barcode = $randomString;
        $scholar_name = "GRADUATE FROM PUBLIC";
        $scholar = DB::table('scholarships')->where('scholarship_name', $scholar_name)->first();
        $scholar_id = $scholar->id;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $personal = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();
        return  view ('scholarship.eefap')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('barcode', $barcode)->with('personal', $personal)->with('education', $education)->with('guardian', $guardian);
    }

    public function ncw()
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $barcode = $randomString;
        $scholar_name = "NCW";
        $scholar = DB::table('scholarships')->where('scholarship_name', $scholar_name)->first();
        $scholar_id = $scholar->id;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $personal = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();
        return  view ('scholarship.eefap')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('barcode', $barcode)->with('personal', $personal)->with('education', $education)->with('guardian', $guardian);
    }
    
    public function oldnew()
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $barcode = $randomString;
        $scholar_name = "VG OLD and NEW";
        $scholar = DB::table('scholarships')->where('scholarship_name', $scholar_name)->first();
        $scholar_id = $scholar->id;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $personal = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();
        return  view ('scholarship.eefap')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('barcode', $barcode)->with('personal', $personal)->with('education', $education)->with('guardian', $guardian);
    }


    public function honors()
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
       // return $randomString;
        $barcode = $randomString;
        $scholar_name = "HONORS and RANKS";

        $scholar = DB::table('scholarships')->where('scholarship_name', $scholar_name)->first();
        $scholar_id = $scholar->id;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $personal = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();
        return  view ('scholarship.eefapgv')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('barcode', $barcode)->with('personal', $personal)->with('education', $education)->with('guardian', $guardian);

    }

    public function dhvtsu()
    {
        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
       // return $randomString;
        $barcode = $randomString;
        $scholar_name = "VG DHVTSU";
       $scholar = DB::table('scholarships')->where('scholarship_name', $scholar_name)->first();
        $scholar_id = $scholar->id;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $personal = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();
        return  view ('scholarship.eefapgv')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)
        ->with('barcode', $barcode)->with('personal', $personal)->with('education', $education)->with('guardian', $guardian);

    }


    public function pclShow()
    {
    //    $district_list = DB::select('select district FROM `munbar` GROUP BY district');
    //     return  view ('eefap-pcl')->with('district_list', $district_list); 
    
    //     return  view ('eefap-pcl')->with('district_list', $district_list); 

        $length=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
       // return $randomString;
        $barcode = $randomString;
        $district_list = DB::select('select district FROM `munbar` GROUP BY district');
        $personal = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();

        return  view ('scholarship.pcl')->with('district_list', $district_list)
        ->with('barcode', $barcode)->with('personal', $personal)->with('education', $education)->with('guardian', $guardian);


    }

    // public function gvShow($id)
    // {
    //     // $municipal_list = DB::select('select municipality from `munbar` group by municipality');
    //     // return  view ('eefap-gv')->with('municipal_list', $municipal_list);

    //      $municipal_list = DB::select('select municipality from `munbar` group by municipality');
    //     return  view ('admin.scholarships.scholar2')->with('municipal_list', $municipal_list);
    // }

    public function shoW()
    {
        return view ('admin.file_maintenance.users.create-step-2');
    }


    public function eefapStore(Request $request)
    {
        
        $id = DB::table('application')->insertGetId([
            'application_status' => 'Pending',
            'renew' => '0',
            'barcode_number' => $request->barcode,
            'barcode_image' => 'NONE',
            'applicant_id' => $request->sid,
            'scholar_id' => $request->scholar_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // $sf = $request->suffix;
        // if($sf=="")
        // {
        //     $sf2=" ";
        // }

        // $gsf = $request->gsuffix;
        // if($gsf=="")
        // {
        //     $gsf=" ";
        // }


        // $street =$request->street;
        // if($street=="")
        // {
        //     $street=" ";
        // }
        $eefap = DB::table('eefap')->insert([
            'surname' => $request->surname,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'suffix' => $request->suffix,
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'street' => $request->street,
            'mobile_number' => $request->mobile_no,
            'fb_account' => $request->fb_account,
            'gsurname' => $request->gsurname,
            'gmiddle_name' => $request->gmiddle_name,
            'gfirst_name' => $request->gfirst_name,
            'gsuffix' => $request->gsuffix,
            'gmobile_number' =>$request->gmobile_no,
            'college_name' => $request->college_name,
            'college_address' => $request->college_address,
            'year_level' => $request->yr_lvl,
            'course' => $request->course,
            'major' => $request->major, 
            'general_average' => $request->gen_average,
            'program_type' => $request->educ_prog,
            'graduating' => $request->grad,
            'spes' => $request->spes,
            'scholarship_id' => $request->scholar_id,
            'applicant_id' => $request->sid,
            'application_id' => $id

            
        ]);

        $reqeefap = DB::table('reqeefap')->insert([
            'scholar_id' =>  $request->scholar_id,
            'applicant_id' => $request->sid,
            'application_id' => $id,
            'created_at' => date('Y-m-d H:i:s'),
            'submit'     => '0'
        ]);

        return redirect('/scholarship/details');

        // $applicant = DB::table('application')->where('applicant_id', Auth::user()->id)->first();
        // return redirect('/scholarship/details')->with('applicant', $application);
    }

    public function eefapgvStore(Request $request)
    {
        
        $id = DB::table('application')->insertGetId([
            'application_status' => 'Pending',
            'renew' => '0',
            'barcode_number' => $request->barcode,
            'barcode_image' => 'NONE',
            'applicant_id' => $request->sid,
            'scholar_id' => $request->scholar_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // $sf2 = $request->suffix;
        // if($sf2=="")
        // {
        //     $sf2=" ";
        // }


        // $street =$request->street;
        // if($street=="")
        // {
        //     $street=" ";
        // }
        $eefap = DB::table('eefapgv')->insert([
            'surname' => $request->surname,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'suffix' => $request->suffix,
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'street' => $request->street,
            'mobile_number' => $request->mobile_no,
            'college_name' => $request->college_name,
            'college_address' => $request->college_address,
            'year_level' => $request->yr_lvl,
            'course' => $request->course,
            'major' => $request->major, 
            'general_average' => $request->gen_average,
            'program_type' => $request->educ_prog,
            'graduating' => $request->grad,
            'spes' => $request->spes,
            'awards'=> $request->award,
            'scholarship_id' => $request->scholar_id,
            'applicant_id' => $request->sid,
            'application_id' => $id

            
        ]);

        $reqgv = DB::table('reqgv')->insert([
            'scholar_id' =>  $request->scholar_id,
            'applicant_id' => $request->sid,
            'application_id' => $id,
            'created_at' => date('Y-m-d H:i:s'),
            'submit'     => '0'
        ]);
        

        return redirect('/scholarship/details');
    }


    public function pclStore(Request $request)
    {
        
        $id = DB::table('application')->insertGetId([
            'application_status' => 'Pending',
            'renew' => '0',
            'barcode_number' => $request->barcode,
            'barcode_image' => 'NONE',
            'applicant_id' => $request->sid,
            'scholar_id' => '6',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $eefap = DB::table('pcl')->insert([
            'surname' => $request->surname,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'suffix' => $request->suffix,
            'district' =>$request->district,
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'street' => $request->street,
            'mobile_number' => $request->mobile_no,

            'fsurname' => $request->fsurname,
            'fmiddle_name' => $request->fmiddle_name,
            'ffirst_name' => $request->ffirst_name,
            'fsuffix' => $request->fsuffix,
            'foccupation' => $request->foccupation,

            'msurname' => $request->msurname,
            'mmiddle_name' => $request->mmiddle_name,
            'mfirst_name' => $request->mfirst_name,
            'msuffix' => $request->msuffix,
            'moccupation' => $request->moccupation,

            'address' => $request->gaddress,

            'school_enrolled' => $request->college_name,
            'year_level' => $request->yr_lvl,
            'course' => $request->course,

            'emergency' =>$request->emergency,
            'emobile_number' => $request->mobile_no,

            'birthdate' =>$request->bday,
            'gender' =>$request->gender,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'civil_status' => $request->civil_status,
            'birth_place' => $request->birth_place,
            'scholarship_id' => '6',
            'applicant_id' => $request->sid,
            'application_id' => $id

            
        ]);

         $reqeefap = DB::table('reqeefap')->insert([
            'scholar_id' =>  $request->scholar_id,
            'applicant_id' => $request->sid,
            'application_id' => $id,
            'created_at' => date('Y-m-d H:i:s'),
            'submit'     => '0'
        ]);


        return redirect('/scholarship/details');
    }













    //fetching from ajax of address
    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('munbar')
        ->where($select, $value)
        ->groupBy($dependent)
        ->get();
        $output = '<option value="" selected disabled>--Select--</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }

    function pfetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('munbar')
        ->where($select, $value)
        ->groupBy($dependent)
        ->get();
        $output = '<option value="" selected disabled>--Select--</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }

}
