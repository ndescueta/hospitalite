<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\tblevent;
use App\tbldate;
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
<<<<<<< HEAD
    }*/
=======
    }

    public function dashboard() {
      return view("admin.dashboard");
    }
>>>>>>> a8bfc4ccac48bacc183d1ade2521ca7a9754cf75
}
