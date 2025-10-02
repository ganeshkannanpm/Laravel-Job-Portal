<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalInfoRequest;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalInfoController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        // Check if personal info exists for this user
        $personalInfo = $user->personalInfo;

        return view('user.personal-info', compact(['personalInfo', 'user']));
    }

    public function create()
    {

        $user = Auth::user();

        return view('user.create-personal-info', compact(['user']));
    }

    public function show()
    {
        $user = Auth::user();
        $personalInfo = $user->personalInfo;

        return view('user.update-personal-info', compact(['user','personalInfo']));
    }

    public function store(PersonalInfoRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        if (PersonalInfo::where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with('error', 'You already created your profile!');
        }

        PersonalInfo::create($validated);

        // return redirect()->back()->with('success', 'Your profile created successfully!');
        return redirect()->route('user.personal-info')->with('success', 'Your profile created successfully!');
    }

    public function update(PersonalInfoRequest $request, $id) {

        $validated = $request->validated();

        $personalInfo = PersonalInfo::where('user_id',auth()->id())->firstOrFail($id);

        $personalInfo->update($validated);

        return redirect()->route('user.personal-info')->with('success', 'Your profile updated successfully!',);
    }

}
