<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HospitalDirectorsController extends Controller
{
    public function index() {
        $selectDirectors= DB::select("SELECT intDirectorId, strDirectorFirstName, strDirectorLastName, stfDirectorContact FROM tbldirector", [1]);
        return view("admin.hospitaldirectors")->with('selectDirectors',$selectDirectors);
    }

    public function getModalEditDirector($intDirectorId) {
        $editDirector = DB::select("SELECT * FROM tbldirector",[1]);
        return $editDirector;
    }

    public function addDirector(Request $request) {

        //POST
        $strDirectorFirstName= $request->strDirectorFirstName;
        $strDirectorMiddleName= $request->strDirectorMiddleName;
        $strDirectorLastName = $request->strDirectorLastName;
        $strDirectorSex = $request->strDirectorSex;
        $datDirectorBirthday = $request->datDirectorBirthday;
        $strDirectorEmailAddress = $request->strDirectorEmailAddress;
        $stfDirectorContact = $request->stfDirectorContact;
        

        //TRANSACT
        DB::beginTransaction();

        try {
            DB::insert("INSERT INTO tbldirector (strDirectorFirstName,strDirectorMiddleName,strDirectorLastName,stfDirectorSex,datDirectorBirthday,strDirectorEmailAddress,stfDirectorContact) values ('$strDirectorFirstName', '$strDirectorMiddleName','$strDirectorLastName','$strDirectorSex','$datDirectorBirthday','$strDirectorEmailAddress','$stfDirectorContact'); ",[1]);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }

        return "Success";
    }

    

    
}
