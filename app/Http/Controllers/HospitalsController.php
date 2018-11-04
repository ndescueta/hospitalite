<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HospitalsController extends Controller
{
    public function index() {
        $selectHospitals= DB::select("SELECT H.intHospitalId, H.intDirectorId, CONCAT(D.strDirectorFirstName, ' ', D.strDirectorLastName) strDirectorName, H.strHospitalName, H.txtHospitalStreet, H.txtHospitalBarangay, H.txtHospitalCity, H.intHospitalZip, H.txtHospitalLogo FROM tblhospital H INNER JOIN tbldirector D ON H.intDirectorId = D.intDirectorId" , [1]);
        $selectDirectors= DB::select("SELECT D.intDirectorId, CONCAT(D.strDirectorFirstName, ' ', D.strDirectorLastName) strDirectorName FROM tbldirector D", [1]);

        return view("admin.hospitals")->with('selectHospitals',$selectHospitals)->with('directorList', $selectDirectors);
    }

    public function getModalEditHospital($intHospitalId) {
        $editHospital = DB::select("SELECT * FROM tblhospital WHERE intHospitalId = '$intHospitalId'; ",[1]);
        return $editHospital;
    }

    public function addHospital(Request $request) {

        //POST
        $strHospitalName= $request->hospitalName;
        $intDirectorId= $request->hospitalDirector;
        $strHospitalStreet = $request->hospitalStreet;
        $txtHospitalBarangay= $request->hospitalBarangay;
        $txtHospitalCity= $request->hospitalCity;
        $intHospitalZip= $request->hospitalZip;
        $hospitalRegCode= $request->hospitalRegCode;

        //TRANSACT
        DB::beginTransaction();

        try {

            DB::insert("INSERT INTO tblhospital (strHospitalName, intDirectorId, txtHospitalStreet, txtHospitalBarangay, txtHospitalCity, intHospitalZip,txtRegisterCode ) VALUES ('$strHospitalName', $intDirectorId, '$strHospitalStreet', '$txtHospitalBarangay', '$txtHospitalCity', '$intHospitalZip','$hospitalRegCode'); ",[1]);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }

        return "Success";
    }

    public function editHospital(Request $request) {
        //POST
        $intHospitalId= $request->hospitalID;
        $strHospitalName= $request->hospitalName;
        $intDirectorId= $request->hospitalDirector;
        $strHospitalStreet = $request->hospitalStreet;
        $txtHospitalBarangay= $request->hospitalBarangay;
        $txtHospitalCity= $request->hospitalCity;
        $intHospitalZip= $request->hospitalZip;
        
                //TRANSACT
                DB::beginTransaction();

                try {
                    DB::insert("UPDATE tblhospital 
                                SET strHospitalName = '$strHospitalName',
                                    intDirectorId = $intDirectorId,
                                    txtHospitalStreet = '$strHospitalStreet',
                                    txtHospitalBarangay = '$txtHospitalBarangay',
                                    txtHospitalCity = '$txtHospitalCity',
                                    intHospitalZip = '$intHospitalZip'
                                WHERE intHospitalId = $intHospitalId; ", [1]);
        
                    DB::commit();
                    // all good
                } catch (\Exception $e) {
                    DB::rollback();
                    // something went wrong
                    return $e;
                }
        
                return "Success";
    }

    public function deleteHospital($intHospitalId) {
        DB::beginTransaction();

        try {
            DB::insert("DELETE FROM tblhospital WHERE intHospitalId = '$intHospitalId'; ",[1]);
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }

        return "Success";
    }

    public function test() {
        $test= DB::select("INSERT INTO test values('asd2','asd3')", [1]);
        return $test;
    }
}
