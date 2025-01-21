<?php

namespace App\Http\Controllers\admin\doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class InformationDoctorController extends Controller
{
    //
    public function index(){
        $doctors=Doctor::all();
        return view('admin.informationDoctor.showAllDoctor',compact('doctors'));
    }
}
