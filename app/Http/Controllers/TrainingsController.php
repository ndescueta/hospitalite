<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TrainingsController extends Controller
{
    public function index() {
        $selectEvents= DB::select("SELECT td.intEventId, DATEDIFF(datDateStart, NOW()) as status, strEventName,datPaymentDue FROM tblevent te JOIN tbldate td ON te.intEventId = td.intEventId WHERE stfEventStatus = 'Active' ", [1]);
        return view("admin.trainings")->with('selectEvents',$selectEvents);
    }

    public function viewEvent($intEventId) {
        $editEvent = DB::select("SELECT * FROM tblevent te JOIN tbldate td ON te.intEventId = td.intEventId WHERE te.intEventId = $intEventId ",[1]);
        return $editEvent;
    }

    public function addEvent(Request $request) {

        //POST
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

        
        //TRANSACT
        DB::beginTransaction();

        try {
            DB::insert("INSERT INTO tblevent (intAdminId,strEventName,txtEventStreet,txtEventBarangay,txtEventCity,intEventZip,txtEventDescription,intEventCapacity,monEventPrice,stfEventBankAccount,strEventPaymentCenter,datPaymentDue,stfEventStatus) values (1,'$strEventName', '$txtEventStreet','$txtEventBarangay','$txtEventCity',$intEventZip,'$txtEventDescription',$intEventCapacity,$monEventPrice,'$stfEventBankAccount','$strEventPaymentCenter','$datPaymentDue','Active'); ",[1]);

            DB::insert("INSERT INTO tbldate(intEventId, datDateStart, datDateEnd, timTimeStart, timTimeEnd, strDateDescription) VALUES((SELECT intEventId FROM tblevent ORDER BY intEventId DESC LIMIT 1),'$datDateStart','$datDateEnd','$timTimeStart','$timTimeEnd','($datDateStart to $datDateEnd) ($timTimeStart to $timTimeEnd)');",[1]);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }

        return "Success";
    }

    public function editEvent(Request $request) {
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
