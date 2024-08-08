<?php

// app/Http/Controllers/Auth/GoogleController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
     
            $user = Socialite::driver('google')->user();
            $findUser = User::where('email', $user->getEmail())->first();
            // dd($user->getName());
            // $allowedDomain = 'example.com';
            // $userEmailDomain = substr(strrchr($user->getEmail(), "@"), 1);
            if ($findUser) {
                Auth::login($findUser);
                
            } else {
                $newUser =  User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => bcrypt('12345678'),
                    'role' => 'user',
                ]);
                Auth::login($newUser, true);
                // return view('auth/register', compact('user'));
            }
            return redirect()->intended('home');
        // } catch (Exception $e) {
        //     dd('ayuja');
        //     return redirect('/login')->with('error', 'Terjadi kesalahan saat mencoba login: ' . $e->getMessage());
        // }
}
}