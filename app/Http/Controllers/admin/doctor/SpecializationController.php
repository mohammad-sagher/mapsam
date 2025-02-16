<?php

namespace App\Http\Controllers\admin\doctor;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    //
    public function index(){
        $specializations = Specialization::all();
        return view('admin.informationDoctor.specializations.index', compact('specializations'));
    }

    public function create(){
        return view('admin.informationDoctor.specializations.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $specialization = Specialization::create($request->all());
            return redirect()->route('admin.doctor.specialization.index');
    }

    public function edit(Specialization $specialization){
        return view('admin.informationDoctor.specializations.edit', compact('specialization'));
    }

    public function update(Request $request, Specialization $specialization){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $specialization->update($request->all());
            return redirect()->route('admin.doctor.specialization.index');
    }

    public function destroy(Specialization $specialization){
        $specialization->delete();
        return redirect()->route('admin.doctor.specialization.index');
    }
}
