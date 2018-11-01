<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\tblevent;
use App\tbldate;
use App\HomeContent;

class AdminController extends Controller
{
  
   //DASHBOARD CONTROLLER
    public function index() {

      return view("admin.dashboard");
    }

    //HOMEPAGE CONTROLLER
    public function homepage() {

      return view("admin.homepage");
    }

    //HOMEPAGE VIEW CONTROLLER
    /*public function homepageView() {
      return view("admin.homepageView");

    }*/



    public function dashboard() {
      $HomePageTitle = HomeContent::where('txtTitle', 'Home Page Title')->get();
      return view("admin.dashboard")->with(compact('HomePageTitle'));
    }

}
