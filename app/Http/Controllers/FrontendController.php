<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\User;
use App\Personal;
use App\Guardian;
use App\Education;
use App\Municipality;
use App\Eefapgv;
use App\Eefap;
use App\Pcl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\SendCode;
use Mail;
use App\Mail\Welcome;
use App\Mail\Awarding;
use Itexmo;
class FrontendController extends Controller
{
    //
    public function fronte()
    {
        $ncw = DB::table('scholarships')->where('id', 1)->first();
        $gad = DB::table('scholarships')->where('id', 2)->first();
        $vg = DB::table('scholarships')->where('id', 3)->first();
        $gp = DB::table('scholarships')->where('id', 4)->first();
        $gpr = DB::table('scholarships')->where('id', 5)->first();
        $pcl = DB::table('scholarships')->where('id', 6)->first();
        $vgd = DB::table('scholarships')->where('id', 7)->first();
        $hr = DB::table('scholarships')->where('id', 8)->first();
        
        // $ck;
        // if($applicant)
        // {
        //     $ck=1;
        // }
        // else
        // {
        //     $ck=0;
        // }
        
        if(Auth::check())
        {
            $applicant = DB::table('application')->where('applicant_id', Auth::user()->id)->first();
            if($applicant)
            {
                $ck=1;
            }
            else
            {
                $ck=0;
            }
            return view ('sas')->with('ncw', $ncw)->with('gad', $gad)->with('vg', $vg)->with('gp', $gp)->with('gpr', $gpr)
            ->with('pcl', $pcl)->with('vgd', $vgd)->with('hr', $hr)->with('ck', $ck);   
        }
        
        else
        {
            return view ('sas')->with('ncw', $ncw)->with('gad', $gad)->with('vg', $vg)->with('gp', $gp)->with('gpr', $gpr)
            ->with('pcl', $pcl)->with('vgd', $vgd)->with('hr', $hr);
        }
    }
    function faq()
    {
        $faq = DB::table('faquestions')->get();
        return view('faq2')->with('faq', $faq);
    }
    function about()
    {
        return view('about-us');
    }

    function contact()
    {
        return view('contact');
    }
    function profile()
    {
        $tak = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();

        
        $gurUrl = array ();
        $eduUrl = array ();
        $takti =  array();

        if($guardian)
        {
            $gurUrl[] = 'profile/guardian-information/edit';
            $gurUrl[] = "Edit Guardian";
        }
        else
        {
            $gurUrl[] = 'profile/guardian-information';
            $gurUrl[] = "Who's your guardian?";
        }

        if($education)
        {
            $eduUrl[] = "/profile/education-information/edit";
            $eduUrl[] = "Edit Education";
        }
        else
        {
            $eduUrl[] = 'profile/education-information';
            $eduUrl[] = 'Where do you study?';
        }

        if($tak)
        {
            $takti[] = "/profile/personal-information/edit";
            $takti[] = "Edit Profile";
        }
        else
        {
            $takti[] = "/profile/personal-information";
            $takti[] = "Complete My Profile";
        }

        return view('front.profile')->with('takti', $takti)->with('gurUrl', $gurUrl)->with('eduUrl', $eduUrl);
    }
    function myProfile()
    {
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return view('front.myprofile')->with('municipal_list', $municipal_list);
    }
    function myProfileEdit()
    {
        $personal = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        $chk=1;
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return view('front.myprofile-edit')->with('municipal_list', $municipal_list)->with('personal', $personal);
    }

    function scholarship()
    {
        $ck;
        $applicant = DB::table('application')->where('applicant_id', Auth::user()->id)->first();

        
        if($applicant)
        {
            $ck="show";
            $scholar = DB::table('scholarships')->where('id', $applicant->scholar_id)->first();
             return view('front.scholarship')->with('ck', $ck)->with('scholar', $scholar);
        }
        else
        {
            $ck="none";
            return view('front.scholarship')->with('ck', $ck);
        }
        
    }

    function sdetails()
    {
        $applicant = DB::table('application')->where('applicant_id', Auth::user()->id)->first();
       

        
        if($applicant)
        {
           $scholar = DB::table('scholarships')->where('id', $applicant->scholar_id)->first();
           $tracking = DB::table('tracking')->where('scholarship_id', $scholar->id)->first(); 
           $log = DB::table('log')->where('scholar_id', $scholar->id)->orderBy('created_at', 'desc')->get();

           if($scholar->type == "eefap")
           {
               $eefap = DB::table('eefap')->where('application_id', $applicant->id)->first();
               return view('front.sdetails')->with('eefap', $eefap)->with('applicant', $applicant)->with('scholar', $scholar)
               ->with('tracking', $tracking)->with('log', $log);
           }
           else if($scholar->type == "eefap-gv")
           {
               $eefapgv = DB::table('eefapgv')->where('application_id', $applicant->id)->first();
               return view('front.sdetails-eefapgv')->with('eefapgv', $eefapgv)->with('applicant', $applicant)->with('scholar', $scholar)
               ->with('tracking', $tracking)->with('log', $log);
           }
           else if($scholar->type == "pcl")
           {
               $pcl = DB::table('pcl')->where('application_id', $applicant->id)->first();
               return view('front.sdetails-pcl')->with('pcl', $pcl)->with('applicant', $applicant)->with('scholar', $scholar)
               ->with('tracking', $tracking)->with('log', $log);
           }
        }
        else
        {
            
        }
        
    }
    
    function guardian()
    {
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return view('front.guardian')->with('municipal_list', $municipal_list);
    }
    function guardianEdit()
    {
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        return view('front.guardian-edit')->with('municipal_list', $municipal_list)->with('guardian', $guardian);
    }
    
    function education()
    {
        return view('front.education');
    }

    function educationEdit()
    {
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();
        return view('front.education-edit')->with('education', $education);
    }

    function account()
    {
        return view('front.account');
    }

    function signup()
    {
        return view('signup');
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


    function storedPersonal(Request $request)
    {

        $personal = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        
        if ($personal) { 

            $id = $personal->id;
            $personals = Personal::find($id);
            $personals->nationality = $request->get('nationality');
            $personals->religion = $request->get('religion');
            $personals->civil_status = $request->get('civil_status');
            $personals->municipality = $request->get('municipality');
            $personals->barangay = $request->get('barangay');
            $personals->street = $request->get('street');
            $personals->birth_place = $request->get('bplace');
            $personals->save();
            
            $user = User::find(Auth::user()->id);
            $user->surname = $request->get('surname');
            $user->first_name = $request->get('first_name');
            $user->middle_name = $request->get('middle_name');
            $user->suffix = $request->get('suffix');
            $user->gender = $request->get('gender');
            $user->bday = $request->get('bday');
            $user->save();
            
            return redirect('/profile');
        }
        else
        {
            $personals = DB::table('personal_info')->insert([
                'nationality' => $request->nationality,
                'religion' => $request->religion,
                'civil_status' => $request->civil_status,
                'municipality' => $request->municipality,
                'barangay' => $request->barangay,
                'street' => $request->street,
                'birth_place' => $request->bplace,
                'applicant_id' => Auth::user()->id
            ]);

            $user = User::find(Auth::user()->id);
            $user->surname = $request->get('surname');
            $user->first_name = $request->get('first_name');
            $user->middle_name = $request->get('middle_name');
            $user->suffix = $request->get('suffix');
            $user->gender = $request->get('gender');
            $user->bday = $request->get('bday');
            $user->save();

            return redirect('/profile');
         }
    }

    function storedGuardian(Request $request)
    {
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();

        if($guardian)
        {
            $id = $guardian->id;
            $guardians = Guardian::find($id);
            $guardians->surname = $request->get('surname');
            $guardians->first_name = $request->get('first_name');
            $guardians->middle_name = $request->get('middle_name');
            $guardians->suffix = $request->get('suffix');
            $guardians->mobile_number = $request->get('mobile_no');
            $guardians->gender = $request->get('gender');
            $guardians->nationality = $request->get('nationality');
            $guardians->occupation = $request->get('occupation');
            $guardians->civil_status = $request->get('civil_status');
            $guardians->municipality = $request->get('municipality');
            $guardians->barangay = $request->get('barangay');
            $guardians->street = $request->get('street');
            $guardians->bday = $request->get('bday');
            $guardians->relationship = $request->get('relationship');
            $guardians->save();
            return redirect('/profile');

        }
        else
        {
            $guardians = DB::table('guardian_info')->insert([
                'surname' => $request->surname,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'suffix' => $request->suffix,
                'mobile_number'  => $request->mobile_no,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
                'occupation' => $request->occupation,
                'civil_status' => $request->civil_status,
                'municipality' => $request->municipality,
                'barangay'  => $request->barangay,
                'street'   => $request->street, 
                'bday'  => $request->bday,
                'relationship' => $request->relationship,
                'applicant_id'  => Auth::user()->id
            ]);
            return redirect('/profile');
        }
    }

    function storedEducation(Request $request)
    {
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();

        if($education)
        {
            $id = $education->id;
            $educations = Education::find($id);
            $educations->course = $request->course;
            $educations->yr_lvl = $request->yr_lvl;
            $educations->yr_entered = $request->yr_entered;
            $educations->duration = $request->duration;
            $educations->college_name = $request->college_name;
            $educations->college_address = $request->college_address;
            $educations->save();

            return redirect ('/profile');
        }
        else
        {
            $educations = DB::table('education_info')->insert([
                'course' => $request->course,
                'yr_lvl' => $request->yr_lvl,
                'yr_entered' => $request->yr_entered,
                'duration'  => $request->duration,
                'college_name' => $request->college_name,
                'college_address' => $request->college_address,
                'applicant_id' => Auth::user()->id
            ]);
            return redirect ('/profile');
        }
    }

    function accountEdit(Request $request)
    {
        $this -> validate($request, [
            'mobile_no' =>'required',
            'email' => 'required|string|email|max:255|unique:users'
            // 'cover_image' => 'image|nullable|max:1999'
        ]);	

        $user = User::find(Auth::user()->id);
        $user->email = $request->get('email1');
        $user->mobile_number = $request->get('mobile_no');
        $user->save();
        return redirect('/account');
    }

    function changePassword(Request $request)
    {
        // $cur = Hash::make('register');
        // if($cur == Auth::user()->password)
        // {
        //     return 'Success!';
        // }
        // return $cur.'----->>>>  $2y$10$KS9I/Myw4Q1FJ0jYgsn86.q7iUkRcOg0RoQC/I6tiTBTE1U6s1NmC';

        
        if (!(Hash::check($request->get('current'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");

        

        // $user = User::find(Auth::user()->id);
        // $user->password = Hash::make($request->get('new_password'));
        // $user->save();
    }

    function uploadprofile(Request $request)
    {
         $this -> validate($request, [
            'uploadFile' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('uploadFile'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('uploadFile')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('uploadFile')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('uploadFile')->storeAs('public/profile_images', $fileNameToStore);
        }
        else
        {
             $fileNameToStore = 'noimage.jpg';
        }

        $user = User::find(Auth::user()->id);
        $user->profile_photo = $fileNameToStore;
        $user->save();
        return redirect ('/account');
    }
    
    function viewEefapgv()
    {
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $eefapgv = DB::table('eefapgv')->where('applicant_id', Auth::user()->id)->first();
        return view('front.eefapgv-view2')->with('eefapgv', $eefapgv)->with('municipal_list', $municipal_list);
    }

    function viewEefap()
    {
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $eefap = DB::table('eefap')->where('applicant_id', Auth::user()->id)->first();
        return view('front.eefap-view')->with('eefap', $eefap)->with('municipal_list', $municipal_list);
    }

    function viewPcl()
    {
        $district_list = DB::select('select district FROM `munbar` GROUP BY district');
        $pcl = DB::table('pcl')->where('applicant_id', Auth::user()->id)->first();
        return view('front.pcl-view')->with('pcl', $pcl)->with('district_list', $district_list);
    }


    function storedEefapgv(Request $request)
    {
        $eefapgvId = DB::table('eefapgv')->where('applicant_id', Auth::user()->id)->first();
        $id = $eefapgvId->id;
        
        $eefapgv = Eefapgv::find($id);
        $eefapgv->surname = $request->get('surname');
        $eefapgv->first_name = $request->get('first_name');
        $eefapgv->middle_name = $request->get('middle_name');
        $eefapgv->suffix = $request->get('suffix');
        $eefapgv->mobile_number = $request->get('mobile_no');
        $eefapgv->municipality = $request->get('municipality');
        $eefapgv->barangay = $request->get('barangay');
        $eefapgv->street = $request->get('street');
        $eefapgv->college_name = $request->get('college_name');
        $eefapgv->college_address = $request->get('college_address');
        $eefapgv->course = $request->get('course');
        $eefapgv->major = $request->get('major');
        $eefapgv->program_type = $request->get('educ_prog');
        $eefapgv->year_level = $request->get('yr_lvl');
        $eefapgv->graduating = $request->get('grad');
        $eefapgv->general_average = $request->get('gen_average');
        $eefapgv->spes = $request->get('spes');
        $eefapgv->awards =$request->get('award');
        $eefapgv->save();
        return redirect ('/scholarship/details');

    }

    function storedEefap(Request $request)
    {
        $eefapId = DB::table('eefap')->where('applicant_id', Auth::user()->id)->first();
        $id = $eefapId->id;
        
        $eefap = Eefap::find($id);
        $eefap->surname = $request->get('surname');
        $eefap->first_name = $request->get('first_name');
        $eefap->middle_name = $request->get('middle_name');
        $eefap->suffix = $request->get('suffix');
        $eefap->mobile_number = $request->get('mobile_no');
        $eefap->municipality = $request->get('municipality');
        $eefap->barangay = $request->get('barangay');
        $eefap->street = $request->get('street');
        $eefap->college_name = $request->get('college_name');
        $eefap->college_address = $request->get('college_address');
        $eefap->course = $request->get('course');
        $eefap->major = $request->get('major');
        $eefap->program_type = $request->get('educ_prog');
        $eefap->year_level = $request->get('yr_lvl');
        $eefap->graduating = $request->get('grad');
        $eefap->general_average = $request->get('gen_average');
        $eefap->spes = $request->get('spes');
        $eefap->fb_account = $request->get('fb_account');
        $eefap->gsurname = $request->get('gsurname');
        $eefap->gfirst_name = $request->get('gfirst_name');
        $eefap->gmiddle_name = $request->get('gmiddle_name');
        $eefap->gsuffix = $request->get('gsuffix');
        $eefap->gmobile_number = $request->get('gmobile_no');
        $eefap->save();
        return redirect ('/scholarship/details');

    }

    function storedPcl(Request $request)
    {
        $pclId = DB::table('pcl')->where('applicant_id', Auth::user()->id)->first();
        $id = $pclId->id;
        
        $pcl = Pcl::find($id);
        $pcl->surname = $request->get('surname');
        $pcl->first_name = $request->get('first_name');
        $pcl->middle_name = $request->get('middle_name');
        $pcl->suffix = $request->get('suffix');
        $pcl->mobile_number = $request->get('mobile_no');
        $pcl->district = $request->get('district');
        $pcl->municipality = $request->get('municipality');
        $pcl->barangay = $request->get('barangay');
        $pcl->street = $request->get('street');
        $pcl->school_enrolled = $request->get('college_name');
        $pcl->course = $request->get('course');
        $pcl->year_level = $request->get('yr_lvl');
        $pcl->fsurname = $request->get('fsurname');
        $pcl->ffirst_name = $request->get('ffirst_name');
        $pcl->fmiddle_name = $request->get('fmiddle_name');
        $pcl->fsuffix = $request->get('fsuffix');
        $pcl->foccupation = $request->get('foccupation');
        $pcl->msurname = $request->get('msurname');
        $pcl->mfirst_name = $request->get('mfirst_name');
        $pcl->mmiddle_name = $request->get('mmiddle_name');
        $pcl->msuffix = $request->get('msuffix');
        $pcl->moccupation = $request->get('moccupation');
        $pcl->address = $request->get('gaddress');
        $pcl->emergency = $request->get('emergency');
        $pcl->emobile_number = $request->get('emobile_no');
        $pcl->gender  = $request->get('gender');
        $pcl->birthdate = $request->get('bday');
        $pcl->nationality = $request->get('nationality');
        $pcl->religion = $request->get('religion');
        $pcl->civil_status = $request->get('civil_status');
        $pcl->birth_place = $request->get('birth_place');
        $pcl->save();
        return redirect ('/scholarship/details');

    }


    function gvfetch(Request $request)
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

    function pclfetch(Request $request)
    {
        $select2 = $request->get('select');
        $value2 = $request->get('value');
        $dependent2 = $request->get('dependent');
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

    function send()
    {
        // $nos = array('639360426646', '639059462732');

        // foreach($nos as $no)
        // {
        //     SendCode::sendCode('HELLO IM JOSHUA OCAMPO! ', $no);
        // }

        // Mail::send(['text'=>'mail'], ['name', 'Pampanga Capitol'], function($message)
        // {
        //     $message->to('guintoproductions@gmail.com', 'To Pampanga')->subject('Sample Email');
        //     $message->from('capitolpampanga@gmail.com', 'Pampanga');
        // });


        // $sc = "ALBERT!";
        // \Mail::to('guintoproductions@gmail.com')->send(new Welcome ($sc));

        // $res = Itexmo::to('09059462732')->message('Hello World!')->send();

        // if($res == '0') {
        // // Success message or logic. Refer to the return codes below.
        //     return 'success!';
        // }
         //\Mail::to('guintoproductions@gmail.com')->send(new Awarding);
         $no = '9059462732';
$res = Itexmo::to('0'.$no)->message('Hello  you have been awarded a scholarship!' )->send();
                           
                            if($res == '0') {
                                //
                            }
       
    }
}
