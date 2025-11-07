<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Job;
use App\Models\JobApplication;

class ManageEmployersController extends Controller
{
    public function index($id)
    {
        $employer = Employer::findOrFail($id);

        $totalJobs = Job::where('employer_id', $employer->id)->count();
        $profile = CompanyProfile::where('employer_id', $employer->id)->first();

        $totalApplicants = JobApplication::whereHas('job', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })->count();

        return view('admin.employer-profile', compact('totalJobs', 'profile', 'totalApplicants'));
    }

    public function create($id)
    {

        $employer = Employer::findOrFail($id);
        $profile = CompanyProfile::where('employer_id', $employer->id)->first();
        return view('admin.edit-account-info', compact('profile'));
    }

    public function show($id)
    {

        $employer = Employer::findOrFail($id);

        $profile = CompanyProfile::where('employer_id', $employer->id)->first();
        $totalJobs = Job::where('employer_id', $employer->id)->count();
        $jobs = Job::where('employer_id', $employer->id)->get();

        return view('admin.employer-jobs', compact('profile', 'totalJobs', 'jobs'));
    }

    public function viewJobs($id)
    {
        $job = Job::findOrFail($id);
        $employer = Employer::findOrFail($job->employer_id);
        $profile = CompanyProfile::where('employer_id', $employer->id)->first();

        return view('admin.employer-view-job', compact('job', 'profile'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'account_status' => 'required|string',
            'verified' => 'required|string',
        ]);

        $profile = CompanyProfile::where('employer_id', $id)->firstOrFail();
        $profile->account_status = $request->account_status;
        $profile->verified = $request->verified;
        $profile->save();

        //update account status in employers table
        $employers = Employer::find($id);

        if ($employers) {
            $employers->status = $request->account_status;
            $employers->save();
        }

        return redirect()->route('admin.employer.profile', $profile->id)->with('success', 'Account Info updated successfully');

    }
}
