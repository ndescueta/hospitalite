<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
   //DASHBOARD CONTROLLER
    public function index() {
      return view("admin.dashboard");
    }

    //TRAININGS CONTROLLER
    public function trainings() {
      return view("admin.trainings");
    }

    //HOMEPAGE CONTROLLER
    public function homepage() {
      return view("admin.homepage");
    }

    //HOMEPAGE VIEW CONTROLLER
    public function homepageView() {
      return view("admin.homepageView");
    }
}
