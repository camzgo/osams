<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;


class AdminController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function saved()
    {
        // $audit = DB::table('audit_log')->insert([
        // 'date' => date('Y-m-d'),
        // 'time' => date('H:i:s'),
        // 'action' => 'User Login',
        // 'employee_id' => Auth::user()->id
        // ]);
      //  return redirect()->intended(route('admin.dashboard'));
    }

    public function logsaved()
    {
        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $chk1 = DB::table('checker')->first();
        if($chk1->chk == 1)
        {
            $audit = DB::table('audit_log')->insert([
            'a_date' => date('Y-m-d'),
            'a_time' => $time,
            'action' => 'User Logout',
            'employee_id' => Auth::user()->id
            ]);
            $chks = DB::table('checker')->where('id', 1)->update([
                'chk' => 0
            ]);
        }
        return redirect('/admin/logout');
    }

    public function index()
    {

        
        // $eefap_mun_list = DB::table('eefap')->join('application', 'application.id', '=', 'eefap.application_id')
        // ->select('eefap.municipality')->where('application.application_status', 'Approved')->where('eefap.municipality', 'MASANTOL')->count();
        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $chk1 = DB::table('checker')->first();
        if($chk1->chk == 0)
        {
            $audit = DB::table('audit_log')->insert([
            'a_date' => date('Y-m-d'),
            'a_time' => $time,
            'action' => 'User Login',
            'employee_id' => Auth::user()->id
            ]);
            $chks = DB::table('checker')->where('id', 1)->update([
                'chk' => 1
            ]);
        }
            

        

    if(Auth::user()->new==0)
       {
            $list =array('ANGELES CITY', 'APALIT', 'ARAYAT', 'BACOLOR',  'CANDABA', 'CITY OF SAN FERNANDO (Capital)', 'FLORIDABLANCA', 'GUAGUA', 'LUBAO', 
            'MABALACAT CITY', 'MACABEBE', 'MAGALANG', 'MASANTOL', 'MEXICO', 'MINALIN', 'PORAC', 'SAN LUIS', 'SAN SIMON', 'SANTA ANA', 'SANTA RITA',
            'SANTO TOMAS', 'SASMUAN (Sexmoan)');
            $scholar = DB::table('scholarships')->get();
            $mod = array();


            // foreach( $scholar as $sc)
            // {
            //     array_push($mod, $sc);
            // }
            for($x=1; $x<=8; $x++)
            {
                $scholar = DB::table('scholarships')->where('id', $x)->first();
                array_push($mod, $scholar->scholarship_name);
                
            }
        // return $mod;

    
        $ctr=0;
        $ctr_eefap = array();
        $ctr_eefapgv = array();
        $ctr_pcl = array();
        //  $scholar = DB::table('scholarships')->where('id', $applicant->scholar_id)->get();
            // $muni = DB::table('munbar')->select('municipality')->groupBy('municipality')->get();
            // foreach($muni as $municipal){
            //      $ctr++;
            //      array_push($array_id, $muni);
            // }
            foreach($list as $li)
            {
                $eefap_mun_list = DB::table('eefap')->join('application', 'application.id', '=', 'eefap.application_id')
            ->select('eefap.municipality')->where('application.application_status', 'Approved')->where('eefap.municipality', $li)->count();
                array_push($ctr_eefap, $eefap_mun_list);

                $eefap_mun_list2 = DB::table('eefapgv')->join('application', 'application.id', '=', 'eefapgv.application_id')
            ->select('eefap.municipality')->where('application.application_status', 'Approved')->where('eefapgv.municipality', $li)->count();
                array_push($ctr_eefapgv, $eefap_mun_list2);

                $eefap_mun_list3 = DB::table('pcl')->join('application', 'application.id', '=', 'pcl.application_id')
            ->select('pcl.municipality')->where('application.application_status', 'Approved')->where('pcl.municipality', $li)->count();
                array_push($ctr_pcl, $eefap_mun_list3);
            }
            $tr = array();
            for($x=1; $x<=8; $x++)
            {
                $sc = DB::table('scholarships')->join('application', 'application.scholar_id', '=', 'scholarships.id')
            ->select('scholarships.scholarship_name')->where('scholarships.id', $x)->where('application.application_status', 'Approved')->count();
                array_push($tr, $sc);
                

            }


            $sum = count($ctr_eefap);
            $sum-=1;
            $add;
            $sadd = array();

            for($i =0; $i<=$sum; $i++)
            {
                $add = $ctr_eefap[$i]+$ctr_eefapgv[$i]+$ctr_pcl[$i];
                array_push($sadd, $add);
                    //echo ;
                    //echo $list[$i].' '.$add.'<br>';
            }
            
            
            $gena1 = DB::table('users')->join('application', 'application.applicant_id', '=', 'users.id')->select('users.gender')->where('users.gender', 'Male')->count();
            $gena2 = DB::table('users')->join('application', 'application.applicant_id', '=', 'users.id')->select('users.gender')->where('users.gender', 'Female')->count();
        
            $gen = array($gena1, $gena2);



            $price= array();
            $total= array();
            $status=array();
            $slot=array();
            $supp = array();
            for($x=1; $x<=8; $x++)
            {
                $amount = DB::table('scholarships')->JOIN('application', 'application.scholar_id', '=', 'scholarships.id')->where('scholarships.id', $x)->sum('scholarships.amount');
                array_push($price, $amount);

                $tot = DB::table('scholarships')->JOIN('application', 'application.scholar_id', '=', 'scholarships.id')->where('scholarships.id', $x)->select('scholarships.id')->count();
                array_push($total, $tot);

                $stat = DB::table('scholarships')->where('id', $x)->first();
                array_push($status, $stat->status);
                array_push($slot, $stat->slot);
                array_push($supp, $stat->supplement);
            }

            $ave = DB::table('scholarships')->JOIN('application', 'application.scholar_id', '=', 'scholarships.id')->select('scholarships.id')->count();
            $pre = DB::table('scholarships')->JOIN('application', 'application.scholar_id', '=', 'scholarships.id')->where('application.application_status', 'Pre-Approved')->select('scholarships.id')->count();
            $approve = DB::table('scholarships')->JOIN('application', 'application.scholar_id', '=', 'scholarships.id')->where('application.application_status', 'Approved')->select('scholarships.id')->count();
            $pending = DB::table('scholarships')->JOIN('application', 'application.scholar_id', '=', 'scholarships.id')->where('application.application_status', 'Pending')->select('scholarships.id')->count();
            $disapprove = DB::table('scholarships')->JOIN('application', 'application.scholar_id', '=', 'scholarships.id')->where('application.application_status', 'Disapproved')->select('scholarships.id')->count();
            $renew = DB::table('scholarships')->JOIN('application', 'application.scholar_id', '=', 'scholarships.id')->where('application.application_status', 'Renew')->select('scholarships.id')->count();
            $over =DB::table('scholarships')->JOIN('application', 'application.scholar_id', '=', 'scholarships.id')->where('application.application_status', "Approved")->sum('scholarships.amount');
            
            $ctr =  strlen ($over);
            if($ctr == 4)
            {
                $over = substr($over,0,1).','.substr($over,1,3);
            }
            else if ($ctr == 5)
            {
                $over = substr($over,0,2).','.substr($over,2,3);
            }
            else if ($ctr == 6)
            {
                $over = substr($over,0,3).','.substr($over,3,3);
            }

            $all = array($ave, $over, $approve, $pending, $disapprove, $renew, $pre);
            // return $all;
             $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
            ->select('account_type.account_name', 'account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
            'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
            
            // $check = array ('sample', 'dfdfdf', 'dfdfdfd', 'dfdfdf', 'dfdfdfd');
            return view('admin.admindash')->with('list', $list)->with('sadd', $sadd)->with('tr', $tr)->with('mod', $mod)->with('gen', $gen)->with('price', $price)
            ->with('total', $total)->with('status', $status)->with('slot', $slot)->with('all', $all)->with('supp', $supp)->with('role', $role);
        // return $price;
       }
       else
       {
            $role = DB::table('account_type')->JOIN('admins', 'admins.account_id', '=', 'account_type.id')
            ->select('account_type.account_name', 'account_type.file_maintenance',  'account_type.submission', 'account_type.transactions', 
            'account_type.utilities', 'account_type.reports')->where('admins.id', Auth::user()->id)->first();
            return view ('admin.file_maintenance.users.emprofile-pass')->with('role', $role);
       }
    

       
    }
}
