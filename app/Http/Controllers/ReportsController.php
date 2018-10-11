<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use FPDF;
use Session;

class ReportsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        // $applicants = DB::table('application')->join('users', 'users.id', '=', 'application.applicant_id')->select('users.first_name')->get();
        // $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        // ->select('account_type.file_maintenance', 'account_type.tracking', 'account_type.submission', 'account_type.transactions', 
        // 'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
        // return view('admin.reports.master')->with('role', $role)->with('applicants', $applicants);
        $sample= Session::get('data');
        $scholar = DB::table('scholarships')->get();
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
      $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
        ->select('account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
        'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
         return view ('admin.reports.master')->with('sample', $sample)->with('scholar', $scholar)->with('role', $role)->with('municipal_list', $municipal_list);
       // include(app_path() . '\repo.php');
    }

    public function appreports($data)
    {
        if($data == "A-E"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->whereBetween('surname', ['A', 'F'])->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        else if($data == "F-J"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->whereBetween('surname', ['F', 'K'])->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        else if($data == "K-O"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->whereBetween('surname', ['K', 'P'])->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        else if($data == "P-T"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->whereBetween('surname', ['P', 'U'])->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        else if($data == "U-Z"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->whereBetween('surname', ['U', 'Z'])->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        else if($data == "ALL"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        //return $data;
        
    }

    public function appmuni($data)
    {
        if($data == "ANGELES CITY"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', 'ANGELES CITY')->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni="ANGELES CITY";
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "APALIT"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality',  $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni="APALIT";
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "ARAYAT"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality',  $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "BACOLOR"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality',  $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "CANDABA"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "CITY OF SAN FERNANDO (Capital)"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni='CITY OF SAN FERNANDO';
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "FLORIDABLANCA"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "GUAGUA"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "LUBAO"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "LUBAO"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MABALACAT CITY"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MACABEBE"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MAGALANG"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MASANTOL"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MEXICO"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MINALIN"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "PORAC"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SAN LUIS"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SAN SIMON"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SANTA ANA"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SANTA RITA"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SANTO TOMAS"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SASMUAN (Sexmoan)"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
    }

    public function appsc($data)
    {
        if($data == 1){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->where('application.scholar_id', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $scholar = DB::table('scholarships')->where('id', $data)->first();
            $muni=$scholar->scholarship_name;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == 2){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->where('application.scholar_id', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $scholar = DB::table('scholarships')->where('id', $data)->first();
            $muni=$scholar->scholarship_name;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == 3){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->where('application.scholar_id', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $scholar = DB::table('scholarships')->where('id', $data)->first();
            $muni=$scholar->scholarship_name;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == 4){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->where('application.scholar_id', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $scholar = DB::table('scholarships')->where('id', $data)->first();
            $muni=$scholar->scholarship_name;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == 5){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->where('application.scholar_id', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $scholar = DB::table('scholarships')->where('id', $data)->first();
            $muni=$scholar->scholarship_name;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == 6){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->where('application.scholar_id', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $scholar = DB::table('scholarships')->where('id', $data)->first();
            $muni=$scholar->scholarship_name;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == 7){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->where('application.scholar_id', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $scholar = DB::table('scholarships')->where('id', $data)->first();
            $muni=$scholar->scholarship_name;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == 8){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('scholarships', 'scholarships.id', '=', 'application.scholar_id')->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->where('application.scholar_id', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $scholar = DB::table('scholarships')->where('id', $data)->first();
            $muni=$scholar->scholarship_name;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
    }

     public function appmuni2($data)
    {
        if($data == "ANGELES CITY"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', 'ANGELES CITY')->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni="ANGELES CITY";
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "APALIT"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality',  $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni="APALIT";
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "ARAYAT"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality',  $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "BACOLOR"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality',  $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "CANDABA"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "CITY OF SAN FERNANDO (Capital)"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni='CITY OF SAN FERNANDO';
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "FLORIDABLANCA"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "GUAGUA"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "LUBAO"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "LUBAO"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MABALACAT CITY"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MACABEBE"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MAGALANG"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MASANTOL"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MEXICO"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "MINALIN"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "PORAC"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SAN LUIS"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SAN SIMON"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SANTA ANA"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SANTA RITA"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SANTO TOMAS"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
        else if($data == "SASMUAN (Sexmoan)"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')
            ->where('personal_info.municipality', $data)->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            $muni=$data;
            return view ('admin.reports.applicant3')->with('json', $json)->with('muni',$muni);
        }
    }

     public function appreports2($data)
    {
        if($data == "A-E"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->whereBetween('surname', ['A', 'F'])->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        else if($data == "F-J"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->whereBetween('surname', ['F', 'K'])->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        else if($data == "K-O"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->whereBetween('surname', ['K', 'P'])->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        else if($data == "P-T"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->whereBetween('surname', ['P', 'U'])->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        else if($data == "U-Z"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->whereBetween('surname', ['U', 'Z'])->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        else if($data == "ALL"){
        //->join('personal_info', 'users.id', '=', 'personal_info.applicant_id')
            $user = DB::table('users')->JOIN('application', 'application.applicant_id', '=', 'users.id')
            ->JOIN('personal_info', 'personal_info.applicant_id', '=', 'users.id')->get();
            $datas = $user->toJson();
            $json = json_decode($datas, true);
            $ctr =  count($json);
            $ctr-=1;
            return view ('admin.reports.applicant1')->with('json', $json);
        }
        //return $data;
        
    }

    public function screpo()
    {
        $scholar = DB::table('scholarships')->get();
        $datas = $scholar->toJson();
        $json2 = json_decode($datas, true);
        return view ('admin.reports.applicant2')->with('json2', $json2);

    }
    
    public function af1()
    {
        return view('admin.reports.repo1');
    }
    public function af2()
    {
        return view('admin.reports.repogv');
    }
    public function af3()
    {
        return view('admin.reports.repopcl');
    }


    
}
