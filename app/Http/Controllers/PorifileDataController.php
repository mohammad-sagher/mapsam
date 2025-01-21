<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataProfileActiveRequest;
use App\Http\Requests\DataProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PorifileDataController extends Controller
{
    //
    public function updateData(Request $request){




        $user = Auth::user();

        Profile::updateOrCreate(['user_id' => Auth::user()->id], [
            'user_id' => Auth::user()->id,
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
        }
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }

    public function updateActivity(DataProfileActiveRequest $request){

        Profile::updateOrCreate(['user_id' => Auth::user()->id], [
            'user_id' => Auth::user()->id,
            'Recent_badges' => $request->Recent_badges,
            'recent_activity' => $request->recent_activity,
            'hobbies' => $request->hobbies,
            'about' => $request->about,
        ]);
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');

    }
}
