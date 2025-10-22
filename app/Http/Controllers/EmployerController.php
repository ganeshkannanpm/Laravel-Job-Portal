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
        $user = auth()->user();

        $totalJobs = Job::count();
        $activeJobs = Job::where('status', 'Active')->count();
        $totalApplications = JobApplication::count();
        $shortlisted = JobApplication::where('status', 'Shortlisted')->count();

        $applications = JobApplication::with('job')
            ->latest()
            ->take(5)
            ->get();

        $postedJobs = Job::withCount('jobApplication')->has('jobApplication')->get();

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
