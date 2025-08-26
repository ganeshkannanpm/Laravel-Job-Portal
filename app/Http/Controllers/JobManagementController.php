<?php

namespace App\Http\Controllers;

use App\Models\SavedJob;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobManagementController extends Controller
{
    public function index()
    {

        $jobs = Job::latest()->get();

        return view('user.job-list', [
            'featuredJobs' => $jobs,
            'user' => auth()->user(),
        ]);
    }

    public function jobApplication()
    {

        return view('user.job-application');
    }

    public function save(Request $request, $jobId)
    {

        $user = Auth::user();

        $alreadySaved = SavedJob::where('user_id', $user->id)
            ->where('job_id', $jobId)
            ->exists();

        if (!$alreadySaved) {

            SavedJob::create([
                'user_id' => $user->id,
                'job_id' => $jobId
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function savedJobs()
    {

        $user = Auth::user();

        $savedJobs = SavedJob::with('job.employer')
            ->where('user_id', $user->id)
            ->get();

        return view('user.saved-jobs', compact('saved-jobs'));

    }
}
