<?php

namespace App\Http\Controllers;

use App\Models\SavedJob;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplication;
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
    public function viewJob(Job $job)
    {
        return view('user.view-job', compact(['job']));
    }

    public function applyJob($jobId)
    {

        $user = auth()->user();
        $job = Job::findOrFail($jobId);
        return view('user.apply-job', compact('user', 'job'));
    }

    public function storeJob(Request $request, $jobId)
    {

        $job = Job::findOrFail($jobId);

        // check if user already applied
        $alreadyApplied = JobApplication::where('user_id', Auth::id())
            ->where('job_id', $job->id)
            ->exists();

        if ($alreadyApplied) {
            return redirect()->back()->with('error', 'You have already applied for "' . $job->title . '".');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'cover_letter' => 'required|string',
            'resume' => 'required|mimes:pdf,doc,docx|max:5120', // 5MB
            'notice_period' => 'required|string',
            'experience' => 'required|string',
            'source' => 'required|string',
        ]);

        // store resume
        $resumePath = $request->file('resume')->store('resumes', 'public');

        JobApplication::create([
            'user_id' => Auth::id(),
            'job_id' => $job->id,
            'name' => $request->name,
            'email' => $request->email,
            'cover_letter' => $request->cover_letter,
            'resume' => $resumePath,
            'notice_period' => $request->notice_period,
            'experience' => $request->experience,
            'source' => $request->source,
        ]);

        return redirect()->back()->with('success', 'Your application for "' . $job->title . '" has been submitted!');

    }

    public function appliedJobs()
    {
        $user = auth()->user();

        $applications = $user
            ->jobApplication()
            ->with('job')
            ->latest()
            ->get();

        return view('user.applied-jobs', compact('user', 'applications'));
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

    public function destroy(JobApplication $application)
    {

        if ($application->user_id !== auth()->id()) {
            abort(403);
        }

        $application->delete();

        return redirect()->back()->with('success', 'Application withdrawn successfully.');
    }

}
