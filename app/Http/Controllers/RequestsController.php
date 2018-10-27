<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\tblrequest;
use App\Event;
use App\tblrepresentative;
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
        $events = Event::where('stfEventStatus','Active')->get();
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
    /*  $requests = tblrequest::where(['stfRequestStatus', '=', 'Unnotified'],
                                    ['intEventId', '=', $intEventId]);*/
                                    $requests = DB::table('tblrequest')
                                    ->leftjoin('tblrepresentative', 'tblrequest.intRepresentativeId', '=', 'tblrepresentative.intRepresentativeId')
                                    ->select('*')
                                    ->where('stfRequestStatus', '=', 'Unnotified')
                                    ->where('intEventId', '=', $intEventId)
                              ->get();
      return view('admin.hospitalrequestShow')->with('requests', $requests);
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
