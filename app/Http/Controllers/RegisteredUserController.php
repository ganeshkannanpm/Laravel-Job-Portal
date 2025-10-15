<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {

        return view('auth.register');
    }

    public function store(Request $request)
    {
        $role = $request->input('role');

        if ($role === 'employer') {
            // Validate employer-specific fields
            $employerAttributes = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:employers,email'],
                'password' => ['required', 'confirmed', Password::min(6)],
                'company_name' => 'required_if:role,employer',
                'company_logo' => 'required_if:role,employer|file|mimes:png,jpg,webp',
            ]);

            // Store employer logo
            $logoPath = $request->file('company_logo')->store('logos');

            // Create employer record
            $employer = Employer::create([
                'name' => $employerAttributes['name'],
                'email' => $employerAttributes['email'],
                'password' => Hash::make($employerAttributes['password']),
                'company_name' => $employerAttributes['company_name'],
                'company_logo' => $logoPath,
            ]);

            // Log in the employer (you need a separate guard for employers)
            Auth::guard('employer')->login($employer);

            return redirect()->route('employer.dashboard');

        } else {
            // Validate normal user/admin
            $userAttributes = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'confirmed', Password::min(6)],
                'role' => ['required', 'in:user,admin'],
            ]);

            $user = User::create([
                'name' => $userAttributes['name'],
                'email' => $userAttributes['email'],
                'password' => Hash::make($userAttributes['password']),
                'role' => $userAttributes['role'],
            ]);

            Auth::login($user);
            return redirect()->route($user->role . '.dashboard');
        }
    }

}
