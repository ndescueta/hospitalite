<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class LoginController extends Controller
{
    public function index() {
        return view("admin.login");
    }

    public function checkLogin(Request $request) {
        $username = $request->username;
        $password = $request->password;

        $query = DB::select("SELECT * FROM tbladmin inner join tblUser on tbladmin.intUserId = tbluser.intUserId WHERE strUserName = '$username' and strUserPassword = '$password'",[1]);

        if(empty($query)) {
            return back()->with('error', 'Wrong Login Details');
        }
        else {
            session(['admin' => $username] );
            return redirect("admin/trainings");
        }

    }

    public function logout() {
        Session::forget('admin');
        return redirect("admin/login");
    }
}
