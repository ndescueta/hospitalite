<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Participants;
use DB;
use App\tblrequest;
use App\Event;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($intRequestId)
    {
      //$participants = Participants::find($intRequestId)->get();
      $events = tblrequest::where('intRequestId',$intRequestId)->get();
      $participants = DB::table('tblparticipants')
      ->join('tblhospital', 'tblparticipants.intHospitalId', '=', 'tblhospital.intHospitalId')
      ->join('tblrequest', 'tblrequest.intRequestId', '=', 'tblparticipants.intRequestId')
      ->select('*')
      ->where('tblrequest.intRequestId', '=', $intRequestId)
      ->get();

      $hospitals = DB::select("select DISTINCT(tblhospital.intHospitalId),strHospitalName from tblparticipants inner join tblhospital on tblparticipants.intHospitalId = tblhospital.intHospitalId where intRequestId = $intRequestId");

      return view('admin.hospitalrequestView')->with((compact('participants','hospitals','events')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRequest(Request $request)
    {
          $status = $request->input('status');

          $requestid = $request->input('requestid');
          $data_request = tblrequest::find($requestid);
          //$data = HomeContent::where('intHomeContentId',$request->input('contentid'))->get();
          $data_request->stfRequestStatus = $request->input('status');
          $data_request->save();

if($status == 'Accepted'){
  $countop = Participants::where('intRequestId',$requestid)->get();
  $participantcount = $countop->count();
  //$participantcount = $countop->Count_of_participants;
  settype($participantcount,"int");

  $eventid =$request->input('intEventId');
  $data_event = Event::find($eventid);
  $capacity = $data_event->intEventCapacity;
  settype($capacity,"int");
  $newEventCapacity = $capacity - $participantcount;
  $data_event->intEventCapacity = $newEventCapacity;
  $data_event->save();
}
//return redirect('/admin/hospitalrequest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
