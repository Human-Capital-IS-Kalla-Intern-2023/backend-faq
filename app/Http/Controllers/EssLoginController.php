<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class EssLoginController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {
            return redirect('http://localhost:3000/home');
        }

        return Socialite::driver('ess')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('ess')->user();
            $findUser = User::query()->where('ess_id', $user->uid)->first();
            if ($findUser) {
                Auth::login($findUser);

                $tokenResult = $findUser->createToken('authToken')->plainTextToken;
                return redirect('http://localhost:3000/callback?token=' . $tokenResult);

            } else {
                $newUser = User::query()->create([
                    'ess_id' => $user->uid,
                    'name' => $user->username,
                    'email' => $user->email,
                    'email_verified_at' => now(),
                    'password' => bcrypt(Str::random(5)),
                ]);
                Auth::login($newUser);
                $tokenResult = $newUser->createToken('authToken')->plainTextToken;
                return redirect('http://localhost:3000/callback?token=' . $tokenResult);
            }
        } catch (\Exception $e) {
            Log::error($e);

            // return Socialite::driver('ess')->redirect();
            return response('Something went wrong!', 500);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('http://localhost:3000/home');
    }
}
