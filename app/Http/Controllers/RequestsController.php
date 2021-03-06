<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\tblrequest;
use App\Event;
use App\Representative;
use App\Participants;
use DB;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $requests = tblrequest::where('stfRequestStatus','Unnotified')->get();
      //  $events = Event::where('stfEventStatus','Active')->get();
      $events = DB::select("SELECT * FROM tblevent WHERE stfEventStatus = 'Active'");
        return view('admin.hospitalrequest')->with(compact('events'));
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
    public function show($intEventId)
    {
      $events = Event::where('intEventId',$intEventId)->get();
      $requests = DB::table('tblrequest')
      ->join('tblrepresentative', 'tblrequest.intRepresentativeId', '=', 'tblrepresentative.intRepresentativeId')
      ->select('*')
      ->where('stfRequestStatus', '=', 'Unnotified')
      ->where('intEventId', '=', $intEventId)
      ->get();
      $acceptedRequests = DB::table('tblrequest')
      ->join('tblrepresentative', 'tblrequest.intRepresentativeId', '=', 'tblrepresentative.intRepresentativeId')
      ->select('*')
      ->where('stfRequestStatus', '=', 'Accepted')
      ->where('stfIsPaid', '=', 'Not Yet')
      ->where('intEventId', '=', $intEventId)
      ->paginate(10);;
      return view('admin.hospitalrequestShow')->with(compact('events','requests','acceptedRequests'));
    }

    public function viewRequest($intRequestId)
    {
      $participants = Participants::find($intRequestId)->get();

      return view('admin.hospitalrequestView')->with('participants', $participants);
    }


    //report
    public function participantList($intEventId)
    {
      $participants = DB::select('SELECT *
FROM tblparticipants INNER JOIN tblrequest
	ON tblparticipants.intRequestId = tblrequest.intRequestId INNER JOIN tblevent
  ON tblrequest.intEventId = tblevent.intEventId INNER JOIN tblrepresentative
  ON tblrequest.intRepresentativeId = tblrepresentative.intRepresentativeId INNER JOIN tblhospital
  ON tblrepresentative.intHospitalId = tblhospital.intHospitalId
WHERE tblrequest.intEventId = '.$intEventId.' AND tblrequest.stfRequestStatus = "Accepted"
ORDER BY tblparticipants.strParticipantLastName ASC');
      return view('admin.participantList')->with('participants', $participants);
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
    public function update(Request $request, $id)
    {
        //
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
