<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Event;
use DB;

use App\Users;
use App\Representative;
use Validator;
use Auth;



class HospitalController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('hospital_side.home');
  }

  public function seminars()
  {
    //$seminars = DB::select('SELECT * FROM tblevent LEFT JOIN tbldate ON tblevent.intEventId = tbldate.intEventId ORDER BY datDateStart DESC')->paginate(4);

    $seminars = DB::table('tblevent')
    ->join('tbldate', 'tblevent.intEventId', '=', 'tbldate.intEventId')
    ->select('*')
    ->paginate(3);

    //$events = $seminars->dates()->orderBy('datDateStart', 'desc')->get();
    //$seminars = \App\Event::with('dates')->get();
    //$seminars = Event::orderBy('datDateStart', 'desc')->dates;
    return view('hospital_side.seminars')->with('seminars', $seminars);
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
    // $seminars = Event::find($intEventId);

    //$seminars = DB::raw('SELECT * FROM tblevent LEFT JOIN tbldate ON tblevent.intEventId = tbldate.intEventId WHERE tblevent.intEventId = 1');

    // $seminars = Event::join('tbldate', 'tbldate.intEventId', '=','tblevent.intEventId')
    // ->select('tbldate.*','tblevent.*')
    // ->where('tblevent.intEventId', $intEventId)
    // ->get();

    $seminars = DB::table('tblevent')
    ->leftjoin('tbldate', 'tblevent.intEventId', '=', 'tbldate.intEventId')
    ->select('*')
    ->where('tblevent.intEventId', $intEventId)
    ->get();

    return view('hospital_side.show')->with('seminars', $seminars);
  }

  public function login(Request $request){
  }

  public function register(Request $request){
    $user = new Users();
    $representative = new Representative();
    $representatives = Representative::all();
    $rep_email = $request->rep_email;
    $users = Users::where('strUserName', '=', $rep_email)
    ->get();

    if (count($users) > 0){
      echo "3";
    }
    else{
      $user->strUserName = $request->rep_email;
      $user->strUserPassword = $request->rep_password;
      $representative->strRepresentativeFirstName = $request->rep_firstname;
      $representative->strRepresentativeMiddleName = $request->rep_middlename;
      $representative->strRepresentativeLastName = $request->rep_lastname;
      $representative->stfRepresentativeSex = $request->rep_sex;
      // $representative->bDay = $request->bDay;
      $representative->stfRepresentativeContact = $request->rep_contact;
      $representative->intHospitalId = 2;
      // $representative->regCode = $request->regCode;
      $representative->txtRepresentativeEmailAddress = $request->rep_email;
      $user->save();
      $representative->save();
      if(!$user && !$representative){
        echo "1"; // not successful
      }
      else {
        echo "2"; // successful
      }
    }
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
