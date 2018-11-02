<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HospitalSettingsController extends Controller
{
    public function index(){
        return view("hospital_side.accountSettings");
    }

    public function uploadLogo(Request $request) {
        $data = $request->image;
        $id = $request->id;

        //GET HOSPITAL ID
        $hospId = DB::select("SELECT intHospitalId FROM tblRepresentative WHERE intRepresentativeId = $id",[1]);
        $hospId = $hospId[0]->intHospitalId;
        list($type,$data) = explode(';',$data);
        list(,$data) = explode(',',$data);

        $data = base64_decode($data);
        $image_name = rand().'.png';
        $path = public_path() . "/hospitalLogos/" . $image_name;

        file_put_contents($path, $data);
        DB::insert("UPDATE tblhospital SET txtHospitalLogo = '$image_name' WHERE intHospitalId = $hospId ",[1]);

        return $hospId;
    }
}
