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
        $editDirector = DB::select("SELECT * FROM tbldirector WHERE intDirectorId = '$intDirectorId'; ",[1]);
        return $editDirector;
    }

    public function addDirector(Request $request) {

        //POST
        $strDirectorFirstName= $request->directorFirstName;
        $strDirectorMiddleName= $request->directorMiddleName;
        $strDirectorLastName = $request->directorLastName;
        $stfDirectorSex = $request->directorSex;
        $datDirectorBirthday = $request->directorBirthday;
        $strDirectorEmailAddress = $request->directorEmailAddress;
        $stfDirectorContact = $request->directorContact;
        

        //TRANSACT
        DB::beginTransaction();

        try {
            DB::insert("INSERT INTO tbldirector (strDirectorFirstName, strDirectorMiddleName, strDirectorLastName, stfDirectorSex, datDirectorBirthday, strDirectorEmailAddress, stfDirectorContact) VALUES ('$strDirectorFirstName', '$strDirectorMiddleName','$strDirectorLastName','$stfDirectorSex','$datDirectorBirthday','$strDirectorEmailAddress','$stfDirectorContact'); ",[1]);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }

        return "Success";
    }

    public function editDirector(Request $request) {
        //POST
        $intDirectorId = $request->directorID;
        $strDirectorFirstName= $request->directorFirstName;
        $strDirectorMiddleName= $request->directorMiddleName;
        $strDirectorLastName = $request->directorLastName;
        $stfDirectorSex = $request->directorSex;
        $datDirectorBirthday = $request->directorBirthday;
        $strDirectorEmailAddress = $request->directorEmailAddress;
        $stfDirectorContact = $request->directorContact;

        //TRANSACT
        DB::beginTransaction();

        try {
            DB::insert("UPDATE tbldirector 
                        SET strDirectorFirstName = '$strDirectorFirstName',
                            strDirectorMiddleName = '$strDirectorMiddleName',
                            strDirectorLastName = '$strDirectorLastName',
                            stfDirectorSex = '$stfDirectorSex',
                            datDirectorBirthday = '$datDirectorBirthday',
                            strDirectorEmailAddress = '$strDirectorEmailAddress',
                            stfDirectorContact = '$stfDirectorContact' 
                        WHERE intDirectorId = '$intDirectorId'; ", [1]);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }

        return "Success";
    }

    public function deleteDirector($intDirectorId) {
        DB::beginTransaction();

        try {
            DB::insert("DELETE FROM tbldirector WHERE intDirectorId = '$intDirectorId'; ",[1]);
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
