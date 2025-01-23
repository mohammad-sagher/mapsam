<?php

namespace App\Http\Controllers\accountant;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DataProfileActiveRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
class AcountantProfileController extends Controller
{
    //
    public static function ShowProfile(){
        $accountant=Auth::guard('accountant')->user();
        $profile=Profile::where('id',$accountant->profile_id)->first();
        return view('accountant.profile.show',compact('profile'));
    }
    public function updateActivity(DataProfileActiveRequest $request){
        $accountant=Auth::guard('accountant')->user();
        $profile=Profile::where('id',$accountant->profile_id)->first();
        $profile->update([
            'Recent_badges' => $request->Recent_badges,
            'recent_activity' => $request->recent_activity,
            'hobbies' => $request->hobbies,
            'about' => $request->about,
        ]);
        return redirect()->route('accountant.ShowProfile')->with('success', 'Profile updated successfully');



    }


    public function updateData(Request $request){



        $accountant=Auth::guard('accountant')->user();
        $profile=Profile::where('id',$accountant->profile_id)->first();
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

        return redirect()->route('accountant.ShowProfile')->with('success', 'Profile updated successfully');
    }


    public function updatePassword(Request $request){
        $validated = $request->validateWithBag('updatePassword', [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        $accountant=Auth::guard('accountant')->user();
        $accountant->update([
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->route('accountant.ShowProfile')->with('success', 'Password updated successfully');
    }

  public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $accountant=Auth::guard('accountant')->user();

           if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/profile'), $imageName);
            $accountant->images()->updateOrCreate(['imageble_id'=>$accountant->id],[
                'url' => $imageName
            ]);
        }

        return redirect()->route('accountant.ShowProfile')->with('success', 'Image updated successfully');
    }

}
