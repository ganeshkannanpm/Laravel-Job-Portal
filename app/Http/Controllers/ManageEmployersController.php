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

        return view('admin.employer-profile',compact('totalJobs','profile','totalApplicants'));
    }

    public function create($id){

        $employer = Employer::findOrFail($id);
        $profile = CompanyProfile::where('employer_id', $employer->id)->first();
        return view('admin.edit-account-info',compact('profile'));
    }
}
