<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\DataProfileActiveRequest;

class DoctorProfileCountroller extends Controller
{
    //
    public function ShowProfile(){

        $doctor=Auth::guard('doctor')->user();
        $profile=Profile::where('id',$doctor->profile_id)->first();
        return view('doctors.profile.show',compact('profile'));
    }

    public function updateActivity(DataProfileActiveRequest $request){
        $doctor=Auth::guard('doctor')->user();
        $profile=Profile::where('id',$doctor->profile_id)->first();
        $profile->update([
            'Recent_badges' => $request->Recent_badges,
            'recent_activity' => $request->recent_activity,
            'hobbies' => $request->hobbies,
            'about' => $request->about,
        ]);
        return redirect()->route('doctor.profile')->with('success', 'Profile updated successfully');



    }


    public function updateData(Request $request){



        $doctor=Auth::guard('doctor')->user();
        $profile=Profile::where('id',$doctor->profile_id)->first();
        $profile->update([
            'username' => $request->username,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/profile'), $imageName);
           $profile->update([
            'image' => $imageName,
           ]);
        }

        return redirect()->route('doctor.profile')->with('success', 'Profile updated successfully');
    }


    public function updatePassword(Request $request){
        $validated = $request->validateWithBag('updatePassword', [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        $doctor=Auth::guard('doctor')->user();
        $doctor->update([
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->route('doctor.profile')->with('success', 'Password updated successfully');
    }


}
