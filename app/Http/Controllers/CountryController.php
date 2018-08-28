<?php

namespace App\Http\Controllers;

use IlluminateHttpRequest;
use IlluminateSupportFacadesInput;

use AppProvinces;
use AppRegencies;
use AppDistricts;
use AppVillages;

class CountryController extends Controller
{
    public function provinces(){
      $provinces = Provinces::all();
      return view('indonesia', compact('provinces'));
    }

    public function regencies(){
      $provinces_id = Input::get('province_id');
      $regencies = Regencies::where('province_id', '=', $provinces_id)->get();
      return response()->json($regencies);
    }

    public function districts(){
      $regencies_id = Input::get('regencies_id');
      $districts = Districts::where('regency_id', '=', $regencies_id)->get();
      return response()->json($districts);
    }

    public function villages(){
      $districts_id = Input::get('districts_id');
      $villages = Villages::where('district_id', '=', $districts_id)->get();
      return response()->json($villages);
    }
}
