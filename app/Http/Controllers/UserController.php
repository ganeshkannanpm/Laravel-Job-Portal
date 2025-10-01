<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        //Recent job application of user
        $applications = JobApplication::with('job')
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        // Recommended jobs for user
        $recommendedJobs = Job::whereNotIn('id', $applications->pluck('job_id'))
            ->latest()
            ->take(5)
            ->get();

        // Saved jobs of user
        $savedJobs = Auth::user()->savedJobs()->latest()->take(5)->get();

        return view('user.dashboard', compact(
            'user',
            'applications',
            'recommendedJobs',
            'savedJobs'
        ));
    }

    public function uploadResume(Request $request)
    {

        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $user = auth()->user();

        if ($request->hasFile('resume')) {

            $file = $request - file('resume');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('resumes', $filename, 'public');

            //Delete old resume if exists
            if ($user->resume && \Storage::disk('public')->exists('resumes/' . $user->resume)) {
                \Storage::disk('public')->delete('resumes/' . $user->resume);
            };

            // Save new resume
            $user->resume = $filename;
            $user->save();
        }

        return redirect()->route('user.resume')->with('success', 'Experience updated successfully');
    }

    public function downloadResume()
    {
        $user = auth()->user();
        if (!$user->resume) {
            return back()->with('error', 'No resume uploaded yet!');
        }

        return response()->download(storage_path('app/public/resumes/' . $user->resume));
    }

}
