<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Representative;
use App\tblhospital;
use Illuminate\Support\Facades\DB;
use Validator;
use Hash;

class RepresentativeRegisterController extends Controller
{
    //DEFINE UNG MIDDLEWARE PAG PUMUNTA NG ADMIN
    public function __construct() {
        $this->middleware('guest:users',['except' => ['logout'] ]);
    }

        
    public function showRegisterForm(){
        return view('hospital_side.register');
    }

    public function checkRegCode(Request $request){
        $regCode = DB::select("SELECT * FROM tblHospital WHERE stfIsRegistered = 'No' AND txtRegisterCode = '$request->regCode'",[1]);
        if(count($regCode) > 0) {
            return $regCode;
        }
        else {
            return "0";
        }
    }

    public function register(Request $request) {
        $this->validate($request, [
            'firstName'   => 'required',
            'middleName'   => 'required',
            'lastName'   => 'required',
            'contact'   => 'required|numeric|min:11',
            'email'   => 'required|email',
            'gender' => 'required',
            'password'  => 'required|min:3',
            'username' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
           ]);

        $Representative = new Representative;
        $Representative->intHospitalId = $request->hospitalId;
        $Representative->strRepresentativeUsername = $request->username;
        $Representative->password = Hash::make($request->password);
        $Representative->strRepresentativeFirstName = $request->firstName;
        $Representative->strRepresentativeMiddleName = $request->middleName;
        $Representative->strRepresentativeLastName = $request->lastName;
        $Representative->stfRepresentativeSex = $request->gender;
        $Representative->txtRepresentativeEmailAddress = $request->email;
        $Representative->stfRepresentativeContact = $request->contact;
        $Representative->save();

        $Hospital = tblhospital::find($request->hospitalId);
        $Hospital->stfIsRegistered = 'Yes';
        $Hospital->save();

        return redirect()->route('hosp.login');
    }
}
