<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $registeredUser = User::where('email', $googleUser->email)->first();

        $newPicture = resizePictureFromGoogle($googleUser->getAvatar());


        if(!$registeredUser){
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => $googleUser->email,
            ]);

            $user->picture = $newPicture;
            $user->markEmailAsVerified();
            $user->syncRoles(Role::GUEST);

            event(new Registered($user));
            auth()->login($user);

            return redirect()->route('home');
        }

        auth()->login($registeredUser);
        return redirect()->route('home');
    }
}
