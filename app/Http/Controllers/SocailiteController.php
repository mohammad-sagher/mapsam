<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class SocailiteController extends Controller
{
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback()
    {
        try {
            
            $githubUser = Socialite::driver('github')->user();
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            return redirect()->route('login');
        }

        $user = User::firstOrCreate(
            ['email' => $githubUser->getEmail()],
            [
                'name' => $githubUser->getName() ?? $githubUser->getNickname(),
                'password' => bcrypt(Str::random(24)),
                'github_id' => $githubUser->getId(),
                'remember_token' => Str::random(60),

            ]
        );

        Auth::login($user);

        return redirect()->route('welcome');
}





    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(Str::random(24)),
                'google_id' => $googleUser->getId(),
                'remember_token' => Str::random(60),

            ]
        );

        Auth::login($user);

        return redirect()->route('welcome');
}
}
