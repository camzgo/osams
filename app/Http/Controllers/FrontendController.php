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
use App\Reqgv;
use App\Reqeefap;
use App\Announcement;
use App\Application;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\SendCode;
use Mail;
use App\Mail\Welcome;
use App\Mail\Awarding;
use App\Mail\Contact;
use App\Mail\RegSuccess;
use Itexmo;
use DataTables;



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
        $announce = DB::table('announcements')->where('a_isdel', 0)->get();
        $view;
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

            if(Auth::user()->chg == 0)
            {
                if(Auth::user()->new==1)
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
                    $view = 1;

                    return view('front.profile')->with('takti', $takti)->with('gurUrl', $gurUrl)->with('eduUrl', $eduUrl)->with('view', $view);
                }
                else
                {
                    return view ('sas')->with('ncw', $ncw)->with('gad', $gad)->with('vg', $vg)->with('gp', $gp)->with('gpr', $gpr)
                    ->with('pcl', $pcl)->with('vgd', $vgd)->with('hr', $hr)->with('ck', $ck)->with('announce', $announce); 
                }
            }
            else
            {
                return view('front.account-del');
            }
              
        }
        
        else
        {
            return view ('sas')->with('ncw', $ncw)->with('gad', $gad)->with('vg', $vg)->with('gp', $gp)->with('gpr', $gpr)
            ->with('pcl', $pcl)->with('vgd', $vgd)->with('hr', $hr)->with('announce', $announce);
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

    function sitemap()
    {
        return view('sitemap');
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
        
        if(Auth::user()->new == 1)
        {
            $view = 1;
        }
        else
        {
            $view=0;
        }

        

        return view('front.profile')->with('takti', $takti)->with('gurUrl', $gurUrl)->with('eduUrl', $eduUrl)->with('view', $view);
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
            return view('front.scholarship')->with('ck', $ck)->with('scholar', $scholar)->with('applicant', $applicant);
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

           $grades = DB::table('grades')->where('student_id', Auth::user()->id)->where('new', 1)->get();
           $grades1 = DB::table('grades')->where('student_id', Auth::user()->id)->where('new', 1)->first();

           if($scholar->type == "eefap")
           {
               $eefap = DB::table('eefap')->where('application_id', $applicant->id)->first();
               $reqeefap = DB::table('reqeefap')->where('applicant_id', Auth::user()->id)->first();
               $amount = $scholar->amount;
               $ctr =  strlen ($amount);
               if($ctr == 4)
               {
                 $amount = substr($amount,0,1).','.substr($amount,1,3);
               }
               else if ($ctr == 5)
               {
                    $amount = substr($amount,0,2).','.substr($amount,2,3);
               }
               else if ($ctr == 6)
               {
                    $amount = substr($amount,0,3).','.substr($amount,3,3);
               }
               
               

               return view('front.sdetails')->with('eefap', $eefap)->with('applicant', $applicant)->with('scholar', $scholar)
               ->with('tracking', $tracking)->with('log', $log)->with('reqeefap', $reqeefap)->with('amount', $amount)->with('grades', $grades)->with('grades1', $grades1);
           }
           else if($scholar->type == "eefap-gv")
           {
               $eefapgv = DB::table('eefapgv')->where('application_id', $applicant->id)->first();
               $reqgv = DB::table('reqgv')->where('applicant_id', Auth::user()->id)->first();
               $reqeefap = DB::table('reqeefap')->where('applicant_id', Auth::user()->id)->first();

               $amount = $scholar->amount;
               $ctr =  strlen ($amount);
               if($ctr == 4)
               {
                 $amount = substr($amount,0,1).','.substr($amount,1,3);
               }
               else if ($ctr == 5)
               {
                    $amount = substr($amount,0,2).','.substr($amount,2,3);
               }
               else if ($ctr == 6)
               {
                    $amount = substr($amount,0,3).','.substr($amount,3,3);
               }

               return view('front.sdetails-eefapgv')->with('eefapgv', $eefapgv)->with('applicant', $applicant)->with('scholar', $scholar)
               ->with('tracking', $tracking)->with('log', $log)->with('reqgv', $reqgv)->with('reqeefap', $reqeefap)->with('amount', $amount)->with('grades', $grades)->with('grades1', $grades1);
           }
           else if($scholar->type == "pcl")
           {
               $pcl = DB::table('pcl')->where('application_id', $applicant->id)->first();
               $reqeefap = DB::table('reqeefap')->where('applicant_id', Auth::user()->id)->first();

               $amount = $scholar->amount;
               $ctr =  strlen ($amount);
               if($ctr == 4)
               {
                 $amount = substr($amount,0,1).','.substr($amount,1,3);
               }
               else if ($ctr == 5)
               {
                    $amount = substr($amount,0,2).','.substr($amount,2,3);
               }
               else if ($ctr == 6)
               {
                    $amount = substr($amount,0,3).','.substr($amount,3,3);
               }

               return view('front.sdetails-pcl')->with('pcl', $pcl)->with('applicant', $applicant)->with('scholar', $scholar)
               ->with('tracking', $tracking)->with('log', $log)->with('reqeefap', $reqeefap)->with('amount', $amount)->with('grades', $grades)->with('grades1', $grades1);
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
        $this -> validate($request, [
            'surname' => 'required|string|regex:/^[a-zA-Z]+$/u|max:50',  
            'first_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:50',
            'middle_name' => 'nullable|regex:/^[a-zA-Z]+$/u|max:50',
            'suffix' => 'nullable|regex:/^[a-zA-Z]+$/u|max:50',
        ]);	
        
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
            $user->school_id = $request->get('school_id');
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

        $this -> validate($request, [
            'surname' => 'required|string|regex:/^[a-zA-Z]+$/u|max:50',  
            'first_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:50',
            'middle_name' => 'nullable|regex:/^[a-zA-Z]+$/u|max:50',
            'suffix' => 'nullable|regex:/^[a-zA-Z]+$/u|max:50',
            'nationality' => 'string|regex:/^[a-zA-Z]+$/u|max:50',
            'occupation' => 'string|regex:/^[a-zA-Z]+$/u|max:50',
        ]);	
        
        
        if($guardian)
        {
            $id = $guardian->id;
            $guardians = Guardian::find($id);
            $guardians->surname = ucfirst($request->get('surname'));
            $guardians->first_name = ucfirst($request->get('first_name'));
            $guardians->middle_name = ucfirst($request->get('middle_name'));
            $guardians->suffix = ucfirst($request->get('suffix'));
            $guardians->mobile_number = $request->get('mobile_no');
            $guardians->gender = $request->get('gender');
            $guardians->nationality = ucfirst($request->get('nationality'));
            $guardians->occupation = ucfirst($request->get('occupation'));
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
                'surname' => ucfirst($request->surname),
                'first_name' => ucfirst($request->first_name),
                'middle_name' => ucfirst($request->middle_name),
                'suffix' => ucfirst($request->suffix),
                'mobile_number'  => $request->mobile_no,
                'gender' => $request->gender,
                'nationality' => ucfirst($request->nationality),
                'occupation' => ucfirst($request->occupation),
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
                'applicant_id' => Auth::user()->id,
                
            ]);

            $user = User::find(Auth::user()->id);
            $user->new = 0;
            $user->save();

            return redirect ('/');
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
        $user->email = $request->get('email');
        $user->mobile_number = $request->get('mobile_no');
        $user->save();
        return redirect('/account');
    }

    function accountpass()
    {
        return view('front.account-del');
    }
    function changePassword(Request $request)
    {
        // $cur = Hash::make('register');
        // if($cur == Auth::user()->password)
        // {
        //     return 'Success!';
        // }
        // return $cur.'----->>>>  $2y$10$KS9I/Myw4Q1FJ0jYgsn86.q7iUkRcOg0RoQC/I6tiTBTE1U6s1NmC';

        
       if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->chg = 0;
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
        $eefapgv->surname = ucfirst($request->get('surname'));
        $eefapgv->first_name = ucfirst($request->get('first_name'));
        $eefapgv->middle_name = ucfirst($request->get('middle_name'));
        $eefapgv->suffix = ucfirst($request->get('suffix'));
        $eefapgv->mobile_number = $request->get('mobile_no');
        $eefapgv->municipality = $request->get('municipality');
        $eefapgv->barangay = $request->get('barangay');
        $eefapgv->street = $request->get('street');
        $eefapgv->college_name = $request->get('college_name');
        $eefapgv->college_address = $request->get('college_address');
        $eefapgv->course = ucfirst($request->get('course'));
        $eefapgv->major = ucfirst($request->get('major'));
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
        $eefap->surname = ucfirst($request->get('surname'));
        $eefap->first_name = ucfirst($request->get('first_name'));
        $eefap->middle_name = ucfirst($request->get('middle_name'));
        $eefap->suffix = ucfirst($request->get('suffix'));
        $eefap->mobile_number = $request->get('mobile_no');
        $eefap->municipality = $request->get('municipality');
        $eefap->barangay = $request->get('barangay');
        $eefap->street = $request->get('street');
        $eefap->college_name = $request->get('college_name');
        $eefap->college_address = $request->get('college_address');
        $eefap->course = ucfirst($request->get('course'));
        $eefap->major = ucfirst($request->get('major'));
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
        $pcl->surname = ucfirst($request->get('surname'));
        $pcl->first_name = ucfirst($request->get('first_name'));
        $pcl->middle_name = ucfirst($request->get('middle_name'));
        $pcl->suffix = ucfirst($request->get('suffix'));
        $pcl->mobile_number = $request->get('mobile_no');
        $pcl->district = $request->get('district');
        $pcl->municipality = $request->get('municipality');
        $pcl->barangay = $request->get('barangay');
        $pcl->street = $request->get('street');
        $pcl->school_enrolled = $request->get('college_name');
        $pcl->course = $request->get('course');
        $pcl->year_level = $request->get('yr_lvl');
        $pcl->fsurname = ucfirst($request->get('fsurname'));
        $pcl->ffirst_name = ucfirst($request->get('ffirst_name'));
        $pcl->fmiddle_name = ucfirst($request->get('fmiddle_name'));
        $pcl->fsuffix = ucfirst($request->get('fsuffix'));
        $pcl->foccupation = ucfirst($request->get('foccupation'));
        $pcl->msurname = ucfirst($request->get('msurname'));
        $pcl->mfirst_name = ucfirst($request->get('mfirst_name'));
        $pcl->mmiddle_name = ucfirst($request->get('mmiddle_name'));
        $pcl->msuffix = ucfirst($request->get('msuffix'));
        $pcl->moccupation = ucfirst($request->get('moccupation'));
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
         //$no = '9059462732';
        
        //  $dbal = array('09360426646', '09059462732');
        //  $vv = count($dbal);
        //  $vv-=1;
        //  for($x=0; $x<=$vv; $x++)
        //  {
        //     $res = Itexmo::to($dbal[$x])->message('Hello  you have been awarded a scholarship!' )->send();
        //     // if($res == '0') {
        //     //     return 'Success!';
        //     // }
        // //  }
        // $dbal = array('guintoproductions@gmail', 'tilun@1blackmoon.com');
        //  $vv = count($dbal);
        //  $vv-=1;


        //  $emails = array('guintoproductions@gmail.com', 'yimipi@dim-coin.com');

        // Mail::send('emails.awarding', [], function($message) use ($emails)
        // {    
        //     $message->to($emails)->subject('This is test e-mail');    
        // });
        // var_dump( Mail:: failures());
        // exit;
        $sample = array();
         $scid = 6;
                    $scholar = DB::table('scholarships')->where('id', $scid)->first();

        // $app2 = DB::table('application')->JOIN('users', 'users.id', '=', 'application.applicant_id')
        // ->JOIN('pcl', 'pcl.application_id', '=', 'application.id')
        // ->where('application.application_status', 'Approved')->select('users.email', 'users.mobile_number', 'users.surname',
        //     'users.first_name', 'users.middle_name', 'users.suffix', 'application.id')->get();
        // $app2->where('application.scholar_id', $scid);

        $app = DB::table('application')->where('application_status', 'Pending')->where('scholar_id', 6)->get();

       

        // foreach($app2 as $emails)
        // {
        //   array_push($sample, $emails);
        // }
        
        // 
    
          //  $app22 = $app2->toArray();
        $samp = $app->toJson();
        
            // $sum=count($app22);
      //dd($app22);
      //return $app22[0]->email;
    //   for($x=0; $x<=$sum; $x++)
    //   {
    //       echo $app22[$x]->email;
    //   }

// $arr = array();
 $json = json_decode($samp, true);
// $ctr = count($json);
// return $json;
// if($ctr==1)
// {
//     $ctr-=1;
// // }
// $mysqldate = date( 'Y-m-d H:i:s', $phpdate );
// $phpdate = strtotime( $mysqldate );
// $str = '5000';
// $str = substr($str,0,1).','.substr($str,1,3);
// print $str;


//return Redirect::route('admin.reports.repo', $id)->with(['data' => $data]);
// echo date('h:i:s a', strtotime(now()));


// for($x=0; $x<=$ctr; $x++)
// {
//     echo $json[$x]['email'].'<br>';
//     echo '0'.$json[$x]['mobile_number'].'<br>';
//     //array_push($arr, $json[$x]['email']);
// }
// return $arr[0];



    // $emails = array();
    // for($x=0; $x<=$ctr; $x++)
    // {
    //     array_push($emails, $json[$x]['email']);
    // }

    // Mail::send('emails.regsuccess', [], function($message) use ($emails)
    // {    
    // $message->to($emails)->subject('This is test e-mail');    
    // });
    // var_dump( Mail:: failures());
    // exit;
    // $name="ALBERT OCAMPO";
    //  Mail::to('guintoproductions@gmail.com')->send(new RegSuccess($name));


    //  for($y=0; $y<=$ctr; $y++)
    //                     {
    //                         $res = Itexmo::to('0'.$json[$y]['mobile_number'])->message('Hello '.$json[$y]['first_name'].' you have been awarded a scholarship!' )->send();
    //                         if($res == '0') {
    //                             //
    //                         }
    //                     }
        // $arr = array();
        // $chunk = array('sample1', 'sample2', 'sample3','sample4', 'sample5');
        // foreach($chunk as $ch)
        // {
        //     array_push($arr, $ch);

        // }
        // return $arr;
        //  Mail::send(['text'=>'mail'], ['name', 'Pampanga Capitol'], function($message)
        //     {
        //         $message->to($dbal)->subject('Sample Email');
        //         $message->from('capitolpampanga@gmail.com', 'Pampanga');
        //     });
                           
                           
       
    }
    public function sendMail($data)
    {   
        
        $samp = $app2->toJson();

        $json = json_decode($samp, true);
        $ctr = count($json);
        $ctr-=1;

        $emails = array();
        for($x=0; $x<=$ctr; $x++)
        {
            array_push($emails, $json[$x]['email']);
        }

        Mail::send('emails.awarding', [], function($message) use ($emails)
        {    
        $message->to($emails)->subject('Awarding of Cheques');    
        });
        var_dump( Mail:: failures());
        exit;

        return redirect('/admin/tracking');
    }

    public function uploadgv()
    {
        return view('upload.uploadgv');
    }

    public function storeduploadgv(Request $request)
    {
        $this -> validate($request, [
            'biodata' => 'file|nullable',
            'grades' => 'image|nullable',
            'cor' => 'image|nullable',
            'brgy' => 'image|nullable',
            'or' => 'image|nullable',
            'oid' => 'image|nullable',
            'honor' => 'image|nullable'
        ]);


        if($request->hasFile('biodata'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('biodata')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('biodata')->getClientOriginalExtension();
            //Filename to store
            $biodata = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('biodata')->storeAs('public/uploads', $biodata);
        }
        else
        {
            $biodata = NULL;
        }
        if($request->hasFile('grades'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('grades')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('grades')->getClientOriginalExtension();
            //Filename to store
            $grades = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('grades')->storeAs('public/uploads', $grades);
        }
        else
        {
             $grades = NULL;
        }
        if($request->hasFile('cor'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('cor')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cor')->getClientOriginalExtension();
            //Filename to store
            $cor = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('cor')->storeAs('public/uploads', $cor);
        }
        else
        {
            $cor = NULL;
        }
        if($request->hasFile('brgy'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('brgy')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('brgy')->getClientOriginalExtension();
            //Filename to store
            $brgy = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('brgy')->storeAs('public/uploads', $brgy);
        }
        else
        {
             $brgy = NULL;
        }
        if($request->hasFile('or'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('or')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('or')->getClientOriginalExtension();
            //Filename to store
            $or = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('or')->storeAs('public/uploads', $or);
        }
        else
        {
            $or = NULL;
        }
        if ($request->hasFile('oid'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('oid')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('oid')->getClientOriginalExtension();
            //Filename to store
            $oid = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('oid')->storeAs('public/uploads', $oid);
        }
        else
        {
             $oid = NULL;
        }
        if ($request->hasFile('honor'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('honor')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('honor')->getClientOriginalExtension();
            //Filename to store
            $honor = $filename.'_'.time().'.'.$extension;
            $path = $request->file('honor')->storeAs('public/uploads', $honor);
        }
        else
        {
             $honor = NULL;
        }
       
        // else
        // {
        //      $fileNameToStore = 'noimage.jpg';
        // }
        $rid = DB::table('reqgv')->where('applicant_id', Auth::user()->id)->first();
        $id = $rid->id;


        $reqgv = Reqgv::find($id);
        $reqgv->biodata = $biodata;
        $reqgv->cor = $cor;
        $reqgv->or = $or;
        $reqgv->grades = $grades;
        $reqgv->brgy = $brgy;
        $reqgv->oid = $oid;
        $reqgv->honor = $honor;


        $reqgv->biodata_sub = 'Submitted';
        $reqgv->cor_sub = 'Submitted';
        $reqgv->or_sub = 'Submitted';
        $reqgv->grades_sub = 'Submitted';
        $reqgv->brgy_sub = 'Submitted';
        $reqgv->oid_sub = 'Submitted';
        $reqgv->honor_sub = 'Submitted';
        $reqgv->submit = 1;

        $reqgv->save();
        return redirect ('/scholarship/details');;
    }

    public function uploadeefap()
    {
        return view('upload.uploadeefap');
    }

    public function storeduploadeefap(Request $request)
    {
        $this -> validate($request, [
            'biodata' => 'file|nullable',
            'grades' => 'image|nullable',
            'cor' => 'image|nullable',
            'brgy' => 'image|nullable',
            'or' => 'image|nullable',
            'oid' => 'image|nullable'
        ]);


        if($request->hasFile('biodata'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('biodata')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('biodata')->getClientOriginalExtension();
            //Filename to store
            $biodata = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('biodata')->storeAs('public/uploads', $biodata);
        }
        else
        {
            $biodata = NULL;
        }
        if($request->hasFile('grades'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('grades')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('grades')->getClientOriginalExtension();
            //Filename to store
            $grades = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('grades')->storeAs('public/uploads', $grades);
        }
        else
        {
             $grades = NULL;
        }
        if($request->hasFile('cor'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('cor')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cor')->getClientOriginalExtension();
            //Filename to store
            $cor = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('cor')->storeAs('public/uploads', $cor);
        }
        else
        {
            $cor = NULL;
        }
        if($request->hasFile('brgy'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('brgy')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('brgy')->getClientOriginalExtension();
            //Filename to store
            $brgy = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('brgy')->storeAs('public/uploads', $brgy);
        }
        else
        {
             $brgy = NULL;
        }
        if($request->hasFile('or'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('or')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('or')->getClientOriginalExtension();
            //Filename to store
            $or = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('or')->storeAs('public/uploads', $or);
        }
        else
        {
            $or = NUll;
        }
        if ($request->hasFile('oid'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('oid')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('oid')->getClientOriginalExtension();
            //Filename to store
            $oid = $filename.'_'.time().'.'.$extension;
            //Upload image 
            $path = $request->file('oid')->storeAs('public/uploads', $oid);
        }
        else
        {
             $oid = NULL;
        }
        if ($request->hasFile('honor'))
        {
            //Get filename with extension
            $filenameWithExt = $request->file('honor')->getClientOriginalName();
            //Get just file
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('honor')->getClientOriginalExtension();
            //Filename to store
            $honor = $filename.'_'.time().'.'.$extension;
            $path = $request->file('honor')->storeAs('public/uploads', $honor);
        }
        else
        {
             $honor = NULL;
        }
       
       
        // else
        // {
        //      $fileNameToStore = 'noimage.jpg';
        // }
        $rid = DB::table('reqeefap')->where('applicant_id', Auth::user()->id)->first();
        $id = $rid->id;


        $reqeefap = Reqeefap::find($id);
        $reqeefap->biodata = $biodata;
        $reqeefap->cor = $cor;
        $reqeefap->or = $or;
        $reqeefap->grades = $grades;
        $reqeefap->brgy = $brgy;
        $reqeefap->oid = $oid;

        $reqeefap->biodata_sub = 'Submitted';
        $reqeefap->cor_sub = 'Submitted';
        $reqeefap->or_sub = 'Submitted';
        $reqeefap->grades_sub = 'Submitted';
        $reqeefap->brgy_sub = 'Submitted';
        $reqeefap->oid_sub = 'Submitted';
        $reqeefap->submit = 1;

        $reqeefap->save();
        return redirect ('/scholarship/details');;
    }

    function eefapdel()
    {
        
        $app = DB::table('application')->where('applicant_id', Auth::user()->id)->first();
        $scholar = DB::table('scholarships')->where('id', $app->scholar_id)->first();
        
        if($scholar->type == "eefap")
        {
            $eefap = DB::table('eefap')->where('applicant_id', Auth::user()->id)->delete();
            $reqe = DB::table('reqeefap')->where('applicant_id', Auth::user()->id)->delete();
            $app2 = DB::table('application')->where('applicant_id', Auth::user()->id)->delete();
            $grad = DB::table('grades')->where('student_id', Auth::user()->id)->where('new', 1)->delete();
        }
        else if($scholar->type == "eefap-gv")
        {
            if($scholar->id == 7)
            {
                $gv = DB::table('eefapgv')->where('applicant_id', Auth::user()->id)->delete();
                $reqe = DB::table('reqeefap')->where('applicant_id', Auth::user()->id)->delete();
                $app2 = DB::table('application')->where('applicant_id', Auth::user()->id)->delete();
                $grad = DB::table('grades')->where('student_id', Auth::user()->id)->where('new', 1)->delete();
                
            }
            else
            {
                $gv = DB::table('eefapgv')->where('applicant_id', Auth::user()->id)->delete();
                $reqgv = DB::table('reqgv')->where('applicant_id', Auth::user()->id)->delete();
                $app2 = DB::table('application')->where('applicant_id', Auth::user()->id)->delete();
                $grad = DB::table('grades')->where('student_id', Auth::user()->id)->where('new', 1)->delete();
            }
        }
        else if($scholar->type == "pcl")
        {
            $pcl = DB::table('pcl')->where('applicant_id', Auth::user()->id)->delete();
            $reqe = DB::table('reqeefap')->where('applicant_id', Auth::user()->id)->delete();
            $app2 = DB::table('application')->where('applicant_id', Auth::user()->id)->delete();
            $grad = DB::table('grades')->where('student_id', Auth::user()->id)->where('new', 1)->delete();
        }

        date_default_timezone_set("Asia/Manila");
        $time = date('h:i:s', strtotime(now()));
        $history = DB::table('history_log')->insert([
            'action'  => 'Application Cancelled',
            'date'     => date('Y-m-d'),
            'time'     =>$time,
            'applicant_id' => Auth::user()->id,
            'scholar_id'  =>$app->scholar_id
        ]);
        return redirect('/scholarship');


    }

    public function news($id)
    {
        $ann = DB::table('announcements')->where('id', $id)->first();
        // $ann = Announcement::find($id);
        return view ('news')->with('ann', $ann);
    }

    public function contactus(Request $request)
    {
        
        $msg = array('name' => $request->get('name'), 
        'email' => $request->get('email2'), 
        'msga' => $request->get('message'));

        // 
        
        Mail::send('emails.contact', $msg, function($message) use($msg)
        {
            
            $message->from($msg['email']);
            $message->to('capitolpampanga@gmail.com');
        });

        return redirect()->back()->with("success","Email is successfully sent!");
       // return $msg;
    }

    function viewEefapgv_edit()
    {
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $eefapgv = DB::table('eefapgv')->where('applicant_id', Auth::user()->id)->first();
        return view('front.eefapgv-view2-edit')->with('eefapgv', $eefapgv)->with('municipal_list', $municipal_list);
    }

    function viewEefap_edit()
    {
        $municipal_list = DB::select('select municipality from `munbar` group by municipality');
        $eefap = DB::table('eefap')->where('applicant_id', Auth::user()->id)->first();
        return view('front.eefap-view-edit')->with('eefap', $eefap)->with('municipal_list', $municipal_list);
    }

    function viewPcl_edit()
    {
        $district_list = DB::select('select district FROM `munbar` GROUP BY district');
        $pcl = DB::table('pcl')->where('applicant_id', Auth::user()->id)->first();
        return view('front.pcl-view-edit')->with('pcl', $pcl)->with('district_list', $district_list);
    }


    function storedEefapgv_edit(Request $request)
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
        $eefapgv->awards =$request->get('award');
        $eefapgv->save();

        $appId = DB::table('application')->where('applicant_id', Auth::user()->id)->first();
        $app = Application::find($appId->id);
        $app->application_status = "Pending";
        $app->renew = "0";
        $app->save();

        return redirect ('/scholarship/details');



    }

    function storedEefap_edit(Request $request)
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
        $eefap->fb_account = $request->get('fb_account');
        $eefap->gsurname = $request->get('gsurname');
        $eefap->gfirst_name = $request->get('gfirst_name');
        $eefap->gmiddle_name = $request->get('gmiddle_name');
        $eefap->gsuffix = $request->get('gsuffix');
        $eefap->gmobile_number = $request->get('gmobile_no');
        $eefap->save();

        $appId = DB::table('application')->where('applicant_id', Auth::user()->id)->first();
        $app = Application::find($appId->id);
        $app->application_status = "Pending";
        $app->renew = "0";
        $app->save();

        return redirect ('/scholarship/details');

    }

    function storedPcl_edit(Request $request)
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

        $appId = DB::table('application')->where('applicant_id', Auth::user()->id)->first();
        $app = Application::find($appId->id);
        $app->application_status = "Pending";
        $app->renew = "0";
        $app->save();

        return redirect ('/scholarship/details');

    }


    // function gvfetch(Request $request)
    // {
    //     $select2 = $request->get('select2');
    //     $value2 = $request->get('value2');
    //     $dependent2 = $request->get('dependent2');
    //     $data = DB::table('munbar')
    //     ->where($select2, $value2)
    //     ->groupBy($dependent2)
    //     ->get();
    //     $output = '<option value="" selected disabled>--Select--</option>';
    //     foreach($data as $row)
    //     {
    //         $output .= '<option value="'.$row->$dependent2.'">'.$row->$dependent2.'</option>';
    //     }
    //     echo $output;
    // }

    // function pclfetch(Request $request)
    // {
    //     $select2 = $request->get('select');
    //     $value2 = $request->get('value');
    //     $dependent2 = $request->get('dependent');
    //     $data = DB::table('munbar')
    //     ->where($select2, $value2)
    //     ->groupBy($dependent2)
    //     ->get();
    //     $output = '<option value="" selected disabled>--Select--</option>';
    //     foreach($data as $row)
    //     {
    //         $output .= '<option value="'.$row->$dependent2.'">'.$row->$dependent2.'</option>';
    //     }
    //     echo $output;
    // }

    function getdata()
    {
        $logs = DB::table('history_log')->JOIN('scholarships', 'scholarships.id', '=', 'history_log.scholar_id')->where('applicant_id', Auth::user()->id)->get();
        return DataTables::of($logs)
        ->addColumn('ss', function($logs){
            return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$logs->id.'"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$logs->id.'"><i class="fa fa-trash"></i> Delete</a> ';
        })
        ->make(true);

    }

    public function printaf($id)
    {
        $app = DB::table('application')->where('applicant_id', $id)->first();
        $scholar_id = DB::table('scholarships')->where('id', $app->scholar_id)->first();

        if($scholar_id->type == "eefap")
        {
            $eefap = DB::table('eefap')->where('application_id', $app->id)->first();
            $req = DB::table('reqeefap')->where('application_id', $app->id)->first();
            return view('admin.reports.repo')->with('app',$app)->with('scholar_id', $scholar_id)->with('eefap', $eefap)->with('req', $req);
        }
        else if($scholar_id->type == "eefap-gv")
        {
            $eefap = DB::table('eefapgv')->where('application_id', $app->id)->first();
            if($scholar_id->id == 7)
            {
                $req = DB::table('reqeefap')->where('application_id', $app->id)->first();
                return view('admin.reports.repogv2')->with('app',$app)->with('scholar_id', $scholar_id)->with('eefap', $eefap)->with('req', $req);
            }
            else
            {
                $req = DB::table('reqgv')->where('application_id', $app->id)->first();
                return view('admin.reports.repogv2')->with('app',$app)->with('scholar_id', $scholar_id)->with('eefap', $eefap)->with('req', $req);
            }
            
        }
        else if($scholar_id->type == "pcl")
        {
            $eefap = DB::table('pcl')->where('application_id', $app->id)->first();
            $req = DB::table('reqeefap')->where('application_id', $app->id)->first();
            return view('admin.reports.repopcl2')->with('app',$app)->with('scholar_id', $scholar_id)->with('eefap', $eefap)->with('req', $req);
        }

    }

    function spes($id)
    {
        return view('scholarship.spes');
    }

    function spes2()
    {
        return view('scholarship.spes2');
    }
}

