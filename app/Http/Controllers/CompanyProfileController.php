<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyProfileRequest;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $profile = CompanyProfile::where('employer_id', auth('employer')->id())->first();
        return view('employer.company-profile', compact('profile'));
    }

    public function create()
    {

        return view('employer.create-company-profile');
    }

    public function store(CompanyProfileRequest $request)
    {

        $validated = $request->validated();
        $validated['employer_id'] = auth('employer')->id();

        if (CompanyProfile::where('employer_id', auth('employer')->id())->exists()) {
            return redirect()->back()->with('error', 'You are already created the profile!');
        }

        //Handle Logo Upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('logos', $filename, 'public');
            $validated['logo'] = $path;
        }

        CompanyProfile::create($validated);

        return redirect()->route('employer.company.profile')->with('message', 'Company profile created successfully');
    }

    public function edit($id)
    {

        $profiles = CompanyProfile::findOrFail($id);
        return view('employer.edit-company-profile', compact('profiles'));
    }

    public function update(CompanyProfileRequest $request, $id)
    {

        $validated = $request->validated();

        $companyProfile = CompanyProfile::where('id', $id)->where('employer_id', auth()->id())->firstOrFail();

        $companyProfile->update($validated);
        
        return redirect()->route('employer.company.profile')->with('success','Your profile updated successfully');

    }
}
