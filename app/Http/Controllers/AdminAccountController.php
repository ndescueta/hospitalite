<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;
use DB;
use Session;

class AdminAccountController extends Controller
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
    public function edit()
    {
        $admin = DB::table('tbluser')
        ->select('*')
        ->where('intUserId', 1)
        ->get();

        return view('adminAccount.edit')->with('admin', $admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $intUserId)
    {
      // $admin = DB::table('tbluser')
      // ->select('*')
      // ->where('intUserId', $id)
      // ->first();

      if($request->input("NewAdminPassword") != '')
      {
        $this->validate($request,
        [
          'AdminUsername' => 'required',
          'NewAdminPassword' => 'required',
          'ConfirmNewAdminPassword' => 'required',
          'CurrentAdminPassword' => 'required'
        ]);
      }
      else
      {
        $this->validate($request,
        [
          'AdminUsername' => 'required',
          'CurrentAdminPassword' => 'required'
        ]);
      }

      $admin = Users::find($intUserId);

      if($request->input("NewAdminPassword") != '' && $request->input("NewAdminPassword") == $request->input("ConfirmNewAdminPassword") && $admin->strUserPassword == $request->input("CurrentAdminPassword"))
      {
        $admin->strUserName = $request->input("AdminUsername");
        $admin->strUserPassword = $request->input('ConfirmNewAdminPassword');
        $admin->save();
        return redirect('/adminAccount/edit')->with('success', 'Admin Account Updated');
      }
      elseif($admin->strUserPassword == $request->input("CurrentAdminPassword"))
      {
        $admin->strUserName = $request->input("AdminUsername");
        $admin->save();
        return redirect('/adminAccount/edit')->with('success', 'Admin Username Updated');
      }
      else
      {
        return redirect('/adminAccount/edit')->with('error', 'Requirements does not match');
      }


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
