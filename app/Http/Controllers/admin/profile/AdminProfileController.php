<?php

namespace App\Http\Controllers\admin\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Http\Requests\DataProfileActiveRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    //
    public static function ShowProfile(){
        $admin=Auth::guard('admin')->user();
        $profile=Profile::where('id',$admin->profile_id)->first();

        return view('admin.profile.show',compact('profile'));
    }

    public function updateActivity(DataProfileActiveRequest $request){
        $admin=Auth::guard('admin')->user();
        $profile=Profile::where('id',$admin->profile_id)->first();
        $profile->update([
            'Recent_badges' => $request->Recent_badges,
            'recent_activity' => $request->recent_activity,
            'hobbies' => $request->hobbies,
            'about' => $request->about,
        ]);
        return redirect()->route('admin.profile.show')->with('success', 'Profile updated successfully');




    }


    public function updateData(Request $request){



        $admin=Auth::guard('admin')->user();
        $profile=Profile::where('id',$admin->profile_id)->first();
        $profile->update([
            'username' => $request->username,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);

        return redirect()->route('admin.profile.show')->with('success', 'Profile updated successfully');
    }


    public function updatePassword(Request $request){
        $validated = $request->validateWithBag('updatePassword', [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        $admin=Auth::guard('admin')->user();
        $admin->update([
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->route('admin.profile.show')->with('success', 'Password updated successfully');
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $admin=Auth::guard('admin')->user();

           if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/profile'), $imageName);
            $admin->images()->updateOrCreate(['imageble_id'=>$admin->id],[
                'url' => $imageName
            ]);
        }

        return redirect()->route('admin.profile.show')->with('success', 'Image updated successfully');
    }
}
