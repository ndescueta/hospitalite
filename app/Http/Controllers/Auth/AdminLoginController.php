<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;

class AdminLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admin',['except' => ['logout'] ]);
    }

    protected function guard(){
        return Auth::guard('admin');
    }

    use AuthenticatesUsers;

    protected $redirectTo = '/admin/trainings';

    public function showLoginForm() {
        return view('auth.admin-login');
    }

    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        if(Auth::guard('admin')->attempt(['strAdminUsername' => $username , 'password' => $password])) {
            return redirect()->intended('/admin/trainings');
        }
        else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    public function logout() {
        //Remove the Token of Admin
        $this->guard("admin")->logout();
        return redirect('admin/login');
    }
}
