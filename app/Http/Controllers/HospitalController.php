<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;
use App\Representative;


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

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  public function register(Request $request){
    $user = new Users();
    $representative = new Representative();
    $users = Users::all();
    $representatives = Representative::all();

    foreach($users as $us){
      $uName = $us->strUserName;
      echo $uName;
    }
    // if($request->rep_email != $uName){
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
    // }
    // else if ($uName == $request->rep_email){
    //   echo "3"; // parehas ng username
    // }
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
  public function show($id)
  {
    //
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
