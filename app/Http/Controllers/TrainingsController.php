<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;

class TrainingsController extends Controller
{
    
    //VIEW CONTROLLERS

    public function index() {
        // $selectEvents= DB::select("SELECT td.intEventId, DATEDIFF(datDateStart, NOW()) as status, strEventName,datPaymentDue FROM tblevent te JOIN tbldate td ON te.intEventId = td.intEventId WHERE stfEventStatus = 'Active' ", [1])->paginate(1);
        // return view("admin.trainings")->with('selectEvents',$selectEvents);

        $selectEvents = DB::table('tblevent')
        ->join('tbldate', 'tbldate.intEventId', '=', 'tblevent.intEventId')
        ->select('tblevent.intEventId',DB::raw(" DATEDIFF(datDateStart, NOW()) as status"), 'strEventName', 'datPaymentDue')
        ->where('stfEventStatus', '=', 'Active')
        ->orderBy('intEventId','desc')
        ->paginate(5);
        return view("admin.trainings")->with('selectEvents',$selectEvents);
    }
    
    public function addEventView() {
        return view("admin.trainingsAdd");
    }

    public function editEventView($intEventId) {
        $editEvents = DB::select("SELECT * FROM tblevent te JOIN tbldate td ON te.intEventId = td.intEventId WHERE te.intEventId = $intEventId ",[1]);

        return view("admin.trainingsEdit")->with('editEvent',$editEvents);
    }



    //CRUD CONTROLLERS
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
        
        $txtEventImage1 = $request->file('file1');
        $txtEventImage2 = $request->file('file2');
        $txtEventImage3 = $request->file('file3');
        //Image Name
        $file1Name = rand() . '.' . $txtEventImage1->getClientOriginalExtension();
        $file2Name = rand() . '.' . $txtEventImage2->getClientOriginalExtension();
        $file3Name = rand() . '.' . $txtEventImage3->getClientOriginalExtension();
        //Move Image
        $txtEventImage1->move(public_path('eventImages'),$file1Name);
        $txtEventImage2->move(public_path('eventImages'),$file2Name);
        $txtEventImage3->move(public_path('eventImages'),$file3Name);
        
        //TRANSACT
        DB::beginTransaction();

        try {
            DB::insert("INSERT INTO tblevent (intAdminId,strEventName,txtEventStreet,txtEventBarangay,txtEventCity,intEventZip,txtEventDescription,intEventCapacity,monEventPrice,stfEventBankAccount,strEventPaymentCenter,datPaymentDue,stfEventStatus,txtEventImage1,txtEventImage2,txtEventImage3) values (1,'$strEventName', '$txtEventStreet','$txtEventBarangay','$txtEventCity',$intEventZip,'$txtEventDescription',$intEventCapacity,$monEventPrice,'$stfEventBankAccount','$strEventPaymentCenter','$datPaymentDue','Active','$file1Name','$file2Name','$file3Name'); ",[1]);

            DB::insert("INSERT INTO tbldate(intEventId, datDateStart, datDateEnd, timTimeStart, timTimeEnd, strDateDescription) VALUES((SELECT intEventId FROM tblevent ORDER BY intEventId DESC LIMIT 1),'$datDateStart','$datDateEnd','$timTimeStart','$timTimeEnd','($datDateStart to $datDateEnd) ($timTimeStart to $timTimeEnd)');",[1]);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }

        return redirect()->action('TrainingsController@index');
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
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return $test;
    }
}
