<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\User;
use App\Personal;
use App\Guardian;
use App\Education;
use App\Municipality;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function fronte()
    {
        return view ('sas');
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
        $personal = DB::table('personal_info')->where('applicant_id', Auth::user()->id)->first();
        $guardian = DB::table('guardian_info')->where('applicant_id', Auth::user()->id)->first();
        $education = DB::table('education_info')->where('applicant_id', Auth::user()->id)->first();

        $perUrl = array (); 
        $gurUrl = array ();
        $eduUrl = array ();
        if($personal)
        {
            $perUrl[] = 'profile/personal-information/edit';
            $perUrl[] ="Edit Profile";
        }
        else
        {
           $perUrl = 'profile/personal-information';
           $pertxt ="Complete My Profile";
        }

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

        return view('front.profile')->with('perUrl', $perUrl)->with('gurUrl', $gurUrl)->with('eduUrl', $eduUrl);
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
        return view('front.scholarship');
    }

    function sdetails()
    {
        return view('front.sdetails');
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
}
