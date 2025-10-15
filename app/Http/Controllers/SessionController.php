<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // First, try employer login
        if (Auth::guard('employer')->attempt($attributes)) {
            $request->session()->regenerate();
            return redirect()->route('employer.dashboard');
        }

        // Then try normal user/admin login
        if (Auth::guard('web')->attempt($attributes)) {
            $request->session()->regenerate();

            $user = Auth::guard('web')->user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.dashboard');
        }

        // If neither guard succeeds
        throw ValidationException::withMessages([
            'email' => "Sorry, credentials do not match our records."
        ]);
    }

    public function destroy()
    {
        if (Auth::guard('employer')->check()) {
            Auth::guard('employer')->logout();
        }

        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
