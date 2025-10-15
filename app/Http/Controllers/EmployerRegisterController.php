<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class EmployerRegisterController extends Controller
{
    public function create(){

        return view('auth.employer-register');
    }

    public function store(Request $request){

        $employerAttributes = $request->validate([
            'name'=>['required'],
            'company_name'=> ['required'],
            'email' => ['required', 'email', Rule::unique('employers', 'email')],
            'password' => ['required', 'confirmed', Password::min(6)],
            'company_logo' => ['required', 'file', 'mimes:png,jpg,webp'],
        ]);

        $logoPath = $request->file('company_logo')->store('logos');

        $employer = Employer::create([
            'name'=> $employerAttributes['name'],
            'company_name'=> $employerAttributes['company_name'],
            'email'=> $employerAttributes['email'],
            'password'=> Hash::make($employerAttributes['password']),
            'company_logo'=> $logoPath
        ]);

        Auth::guard('employer')->login($employer);
        
        // return redirect()->route('login')->with('message', 'Registeration successfull');
        return redirect()->route('employer.dashboard');

    }
}
