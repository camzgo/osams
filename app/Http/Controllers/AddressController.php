<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IlluminateSupportFacadesInput;
use App\Http\Controllers\Input;

// use App\Region;
// use App\Province;
use App\Municipality;
use App\Barangay;


class AddressController extends Controller
{
    //

    public function municipal(){
        $provCode = "0354";
        $municipalities = Municipality::where('provCode', '=', $provCode)->get();
        // return view('admin.file_maintenance.users.create-step', compact('$municipalities'));
        return view('admin.file_maintenance.users.create-step', compact('municipalities'));
    }

    public function barangay(){
      $citymunCodes = Input::get('citymunCode');
      $barangays = Barangay::where('citymunCode', '=', $citymunCodes)->get();
      return response()->json($barangays);
    }
}
