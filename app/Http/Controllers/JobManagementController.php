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

    public function applyJob(){

        $user = auth()->user();
        return view('user.apply-job',compact('user'));
    }

    public function jobApplication()
    {

        return view('user.job-application');
    }

    public function save(Request $request, $jobId)
    {
        $user = Auth::user();

        $savedJob = SavedJob::where('user_id', $user->id)
            ->where('job_id', $jobId)
            ->first();

        if ($savedJob) {
            // If already saved, remove it (unsave)
            $savedJob->delete();
            $status = 'unsaved';
        } else {
            // Otherwise, save it
            SavedJob::create([
                'user_id' => $user->id,
                'job_id' => $jobId
            ]);
            $status = 'saved';
        }

        return redirect()->back()->with('status', $status);
    }

    public function unsave(Request $request, $jobId)
    {
        $user = Auth::user();

        $savedJob = SavedJob::where('user_id', $user->id)
            ->where('job_id', $jobId)
            ->first();

        if ($savedJob) {
            $savedJob->delete();
            return redirect()->back()->with('success', 'Job unsaved successfully');
        }

        return redirect()->back()->with('success', 'Job not found');
    }

    public function savedJobs()
    {

        $user = Auth::user();

        $savedJobs = SavedJob::with('job.employer')
            ->where('user_id', $user->id)
            ->get();

        return view('user.saved-jobs', compact('savedJobs', 'user'));

    }
}
