<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Avaliable_Time;
use Illuminate\Http\Request;
use App\Http\Requests\doctor\AvailableTimeRequest;
use App\Models\Doctor;

class AvalaibletimeDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor = auth()->guard('doctor')->user();
        $avaliableTimes = $doctor->avaliableTimes;
        return view('doctors.avaliable_time.index', compact('avaliableTimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('doctors.avaliable_time.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AvailableTimeRequest $request,$id)
    {
        $doctor = Doctor::find($id);



               $doctor->avaliableTimes()->create($request->validated());


        return redirect()->route('doctor.avaliable_times.index')->with('success','Avaliable Time and Time Slots Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $avaliableTime = Avaliable_time::with('timeSlots')->find($id);

        return view('doctors.avaliable_time.showTimeSlots', compact('avaliableTime'))->with('success','Avaliable Time and Time Slots Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $avaliableTime = Avaliable_time::find($id);
        return view('doctors.avaliable_time.edit', compact('avaliableTime'))->with('success','Avaliable Time and Time Slots Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AvailableTimeRequest $request, string $id)
    {
        //
        $avaliableTime = Avaliable_time::find($id);
        $avaliableTime->update($request->validated());
        return redirect()->route('doctor.avaliable_times.index')->with('success','Avaliable Time and Time Slots Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $avaliableTime = Avaliable_time::find($id);
        $avaliableTime->timeSlots()->delete();
        $avaliableTime->delete();
        return redirect()->route('doctor.avaliable_times.index')->with('success','Avaliable Time and Time Slots Deleted Successfully');
    }
}
