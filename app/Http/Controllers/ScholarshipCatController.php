<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\View;
use DB;
use App\Municipality;



class ScholarshipCatController extends Controller
{
    //
    public function eefapShow()
    {
        // return view ('admin.scholarships.eefap');

       // return view ('admin.scholarships.eefap-3');
        
    
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return  view ('eefap')->with('municipal_list', $municipal_list);

        // return view ('admin.file_maintenance.users.create-step-2');
    }

    public function pclShow()
    {
       $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return  view ('eefap-pcl')->with('municipal_list', $municipal_list); 
    }

    public function shoW()
    {
        return view ('admin.file_maintenance.users.create-step-2');
    }

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

}
