<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HospitalsController extends Controller
{
    public function index() {
        $selectHospitals= DB::select("SELECT * from tblHospital" , [1]);
        return view("admin.hospitals")->with('selectHospitals',$selectHospitals);
    }

    public function addHospital(Request $request) {

        //POST
        $strHospitalName= $request->strHospitalName;
        $strHospitalStreet = $request->strHospitalStreet;
        $txtHospitalBarangay= $request->txtHospitalBarangay;
        $txtHospitalCity= $request->txtHospitalCity;
        $intHospitalZip= $request->intHospitalZip;

        
        //TRANSACT
        DB::beginTransaction();

        try {

            DB::insert("INSERT INTO tblhospital(strHospitalName, txtHospitalStreet, txtHospitalBarangay, txtHospitalCity, intHospitalZip) VALUES ('$strHospitalName', '$strHospitalStreet', '$txtHospitalBarangay', '$txtHospitalCity', '$intHospitalZip');",[1]);

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
        $intEventId = $request->intEventId;
        $strEventName= $request->strEventName;
        $txtEventStreet= $request->txtEventStreet;
        $txtEventBarangay= $request->txtEventBarangay;
        $txtEventCity= $request->txtEventCity;
        $intEventZip= $request->intEventZip;
        $txtEventDescription= $request->txtEventDescription;
        $intEventCapacity= $request->intEventCapacity;
        $monEventPrice= $request->monEventPrice;
        $stfEventBankAccount= $request->stfEventBankAccount;
        $strEventPaymentCenter= $request->strEventPaymentCenter;
        $datPaymentDue= $request->datPaymentDue;

        $datDateStart= $request->datDateStart;
        $datDateEnd= $request->datDateEnd;
        $timTimeStart= $request->timTimeStart;
        $timTimeEnd= $request->timTimeEnd;

        DB::insert("UPDATE tblevent SET strEventName = '$strEventName', txtEventStreet = '$txtEventStreet',txtEventBarangay = '$txtEventBarangay', txtEventCity = '$txtEventCity', intEventZip = $intEventZip,txtEventDescription = '$txtEventDescription',intEventCapacity = $intEventCapacity,monEventPrice = $monEventPrice,stfEventBankAccount = '$stfEventBankAccount',strEventPaymentCenter = '$strEventPaymentCenter',datPaymentDue = '$datPaymentDue' WHERE intEventId = $intEventId",[1]);

    }

    public function deleteEvent(Request $request) {
        //POST
        $intEventId = $request->intEventId;
        DB::insert("UPDATE tblevent SET stfEventStatus = 'Inactive' WHERE intEventId = $intEventId;",[1]);
        return "success";
    }

    public function test() {
        $test= DB::select("INSERT INTO test values('asd2','asd3')", [1]);
        return $test;
    }
}
