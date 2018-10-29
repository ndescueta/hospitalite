<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Participants;
use DB;

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
        //INSERT REQUEST
        $query = "INSERT INTO tblRequest(intRepresentativeId,intEventId,datRequestDate) VALUES (1,$request->intEventId,'".now()."')";
        DB::insert($query,[1]);
        //RETRIEVE LATEST REQUEST
        $latestRequest = DB::select("SELECT MAX(intRequestId) as latestRequest FROM `tblrequest`",[1]);
        $latestRequest = $latestRequest[0]->latestRequest;
        return $latestRequest;
    }

    public function store2(Request $request) {
        //INSERT PARTICIPANT
        $query = "INSERT INTO tblParticipants(intRequestId,intHospitalId,strParticipantFirstName,strParticipantMiddleName,strParticipantLastName,stfParticipantSex,datParticipantBirthday,txtParticipantEmailAddress,strParticipantContact) VALUES($request->intRequestId,2,'$request->strParticipantFirstName','$request->strParticipantMiddleName','$request->strParticipantLastName','$request->stfParticipantSex','$request->datParticipantBirthday','$request->txtParticipantEmailAddress','$request->strParticipantContact')";
        DB::insert($query,[1]);
        return "Success";
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
      $participants = DB::table('tblparticipants')
      ->join('tblhospital', 'tblparticipants.intHospitalId', '=', 'tblhospital.intHospitalId')
      ->select('*')
      ->where('intRequestId', '=', $intRequestId)
      ->get();

      $hospitals = DB::select("select DISTINCT(tblhospital.intHospitalId),strHospitalName from tblparticipants inner join tblhospital on tblparticipants.intHospitalId = tblhospital.intHospitalId where intRequestId = $intRequestId");

      return view('admin.hospitalrequestView')->with((compact('participants','hospitals')));
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
