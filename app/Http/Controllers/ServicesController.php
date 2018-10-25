<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index() 
    {
        $selectServices= DB::select("SELECT Se.intServiceId, Ho.strHospitalName, Se.strServiceName, Se.txtServiceDescription 
                                      FROM tblservices Se 
                                        INNER JOIN tblhospital Ho ON Se.intHospitalId = Ho.intHospitalId", [1]);
        return view("admin.hospitalservices")->with('selectServices',$selectServices);
    }

    public function getModalEditService($intDirectorId) 
    {
        $editService = DB::select("SELECT * FROM tblservices WHERE intServiceID = '$intDirectorId'",[1]);
        return $editService;
    }

    public function addService(Request $request) 
    {
        //POST
        $intHospitalID = ("SELECT TOP 1 intServiceId FROM tblServices");
        $strServiceName= $request->strServiceName;
        $strServiceDescription= $request->strServiceDescription;

        //TRANSACT
        DB::beginTransaction();

        try {
            DB::insert("INSERT INTO tblservices (intHospitalId ,strServiceName, txtServiceDescription) 
                        VALUES ('$intHospitalID', '$strServiceName','$strServiceDescription'); ",[1]);
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }

        return "Success";
    }

    public function editService(Request $request) 
    {
        //POST
        $intServiceId = $request->intServiceId;
        $strServiceName= $request->strServiceName;
        $strServiceDescription= $request->strServiceDescription;

        DB::insert("UPDATE tblservices
                   SET strServiceName = '$strServiceName',
                       txtServiceDescription = '$strServiceDescription'
                   WHERE intServiceId = '$intServiceId';", [1]);

        return "Success";
    }

    public function deleteService(Request $request)
    {
        DB::insert("DELETE FROM tblServices WHERE intServiceID = '$request->intServiceId'");

        return "Success";
    }
}
