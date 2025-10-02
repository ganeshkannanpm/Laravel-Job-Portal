<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {

        return view('auth.register');
    }

    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],
            'role' => ['required', 'in:user,employer'],
        ]);

        // Create user
        $user = User::create([
            'name' => $userAttributes['name'],
            'email' => $userAttributes['email'],
            'password' => bcrypt($userAttributes['password']),
            'role' => $userAttributes['role']
        ]);

        // If employer, validate employer fields and create related record
        if ($user->role === 'employer') {

            $employerAttributes = $request->validate([
                'employer' => ['required'],
                'logo' => ['required', File::types(['png', 'jpg', 'webp'])]
            ]);

            $logoPath = $request->logo->store('logos');

            $user->employer()->create([
                'name' => $employerAttributes['employer'],
                'logo' => $logoPath
            ]);

        }

        Auth::login($user);
        return redirect()->route($user->role . '.dashboard');
    }
}
