<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;

class LoginController extends Controller
{
    //DEFINE UNG MIDDLEWARE PAG PUMUNTA NG ADMIN
    public function __construct() {
        $this->middleware('guest:users',['except' => ['logout'] ]);
    }

    //SPECIFY MO UNG GUARD NA GAGAMITIN
    protected function guard(){
        return Auth::guard('users');
    }

    use AuthenticatesUsers;

    //SAAN MAREREDIRECT
    protected $redirectTo = '/hosp/home';

    //SHOW LOGIN FORM
    public function showLoginForm() {
        return view('auth.login');
    }

    //LOGIN FUNCTION
    public function login(Request $request) {
        $username = $request->username;
        $password = $request->password;

        if(Auth::guard('users')->attempt(['strRepresentativeUsername' => $username , 'password' => $password])) {
            return redirect()->intended('/hosp/seminars');
        }
        else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    //LOGOUT FUNCTION
    public function logout() {
        //Remove the Token of Admin
        $this->guard("users")->logout();
        return redirect('hosp/login');
    }
}
