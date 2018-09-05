<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\View;
use DB;
use App\Scholarship;
use App\Municipality;



class ScholarshipCatController extends Controller
{
    //
    public function generateRandomString($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
  

    public function gadShow($id)
    {
        // return view ('admin.scholarships.eefap');

       // return view ('admin.scholarships.eefap-3');
        
    
        // $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        // return  view ('eefap')->with('municipal_list', $municipal_list);
        $length=8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
       // return $randomString;
        $barcode = $randomString;
        $scholar_name = "GAD";
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return  view ('admin.scholarships.scholar1')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)->with('scholar_name', $scholar_name)->with('barcode', $barcode);

        // return view ('admin.file_maintenance.users.create-step-2');
    }


    public function gradprivate($id)
    {
        $scholar_name = "GRADUATE FROM PRIVATE";
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return  view ('admin.scholarships.scholar1')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)->with('scholar_name', $scholar_name);
    }

    public function gradpublic($id)
    {
        $scholar_name = "GRADUATE FROM PUBLIC";
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return  view ('admin.scholarships.scholar1')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)->with('scholar_name', $scholar_name);
    }

    public function ncw($id)
    {
        $scholar_name = "NCW";
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return  view ('admin.scholarships.scholar1')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)->with('scholar_name', $scholar_name);
    }
    
    public function oldnew($id)
    {
        $scholar_name = "VG OLD and NEW";
        $scholars =  Scholarship::select("id")->where('scholarship_name', $scholar_name)->first();
        $scholar1 = str_replace("{", '', $scholars);
        $scholar2 = str_replace("}", '', $scholar1);
        $scholar3 = str_replace("\"id\":", '', $scholar2);
        $scholar_id = $scholar3;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return  view ('admin.scholarships.scholar1')->with('municipal_list', $municipal_list)->with('scholar_id', $scholar_id)->with('scholar_name', $scholar_name);
    }


    public function honors($id)
    {
        $scholar_name = "HONORS and RANKS";
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return  view ('admin.scholarships.scholar2')->with('municipal_list', $municipal_list)->with('scholar_name', $scholar_name);
    }

    public function dhvtsu($id)
    {
        $scholar_name = "VG DHVTSU";
        $scholarship =  DB::select('select * from scholarships where scholarship_name = : scholarship_name', ['scholarship_name' => $scholar_name]);
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return  view ('admin.scholarships.scholar2')->with('municipal_list', $municipal_list)->with('scholarship', $scholarship);
    }


    public function pclShow($id)
    {
    //    $district_list = DB::select('select district FROM `munbar` GROUP BY district');
    //     return  view ('eefap-pcl')->with('district_list', $district_list); 
    
    //     return  view ('eefap-pcl')->with('district_list', $district_list); 
        $district_list = DB::select('select district FROM `munbar` GROUP BY district');
        return view ('admin.scholarships.scholar3')->with('district_list', $district_list); 

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
        $sf = $request->suffix;
        if($sf=="")
        {
            $sf2=" ";
        }
        $eefap = DB::table('eefap')->insert([
            'surname' => $request->surname,
            'first_namee' => $request->first_name,
            'middle_name' => $request->middle_name,
            'suffix' => $sf2,
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'street' => $request->street,
            'mobile_no' => $request->mobile_number,
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
            'scholarship_id' => $request->aid,
            
        ]);

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
        $select2 = $request->get('select2');
        $value2 = $request->get('value2');
        $dependent2 = $request->get('dependent2');
        $data = DB::table('munbar')
        ->where($select2, $value2)
        ->groupBy($dependent2)
        ->get();
        $output = '<option value="" selected disabled>--Select--</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent2.'">'.$row->$dependent2.'</option>';
        }
        echo $output;
    }

}
