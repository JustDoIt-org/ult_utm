<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $registeredUser = User::where('email', $googleUser->email)->first();

        if(!$registeredUser){
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => $googleUser->email,
                // 'google_token' => $googleUser->token,
                // 'google_refresh_token' => $googleUser->refreshToken,
            ]);

            auth()->login($user);
            event(new Registered($user));

            return redirect()->route('home');
        }

        auth()->login($registeredUser);
        return redirect()->route('home');
    }
}
