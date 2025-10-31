<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostJobRequest;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function index()
    {
        $employer = auth('employer')->user();

        $totalJobs = Job::where('employer_id', $employer->id)->count();
        $activeJobs = Job::where('employer_id', $employer->id)
            ->where('status', 'Active')
            ->count();

        $totalApplications = JobApplication::whereHas('job', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })->count();

        $shortlisted = JobApplication::whereHas('job', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })->where('status', 'Shortlisted')->count();

        $applications = JobApplication::with('job')
            ->whereHas('job', function ($query) use ($employer) {
                $query->where('employer_id', $employer->id);
            })
            ->latest()
            ->take(5)
            ->get();

        $postedJobs = Job::withCount('jobApplication')
            ->where('employer_id', $employer->id)
            ->has('jobApplication')
            ->get();

        return view('employer.dashboard', compact([
            'totalJobs',
            'activeJobs',
            'totalApplications',
            'shortlisted',
            'applications',
            'postedJobs'
        ]));
    }

    public function create()
    {

        return view('employer.post-job');
    }

    public function store(PostJobRequest $request)
    {
        $data = $request->validated();

        $data['employer_id'] = Auth::id();

        // Convert skills to JSON if needed
        if (isset($data['skills_required'])) {
            $data['skills_required'] = json_encode(explode(',', $data['skills_required']));
        }

        $data['posted'] = now()->format('Y-m-d');

        Job::create($data);

        return redirect()->route('employer.jobs.create')->with('success', 'Job posted successfully!');
    }

}
