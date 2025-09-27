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

        // Recommended jobs
        // $recommendedJobs = Job::whereNotIn('id', $applications->pluck('job_id'))
        //     ->latest()
        //     ->take(5)
        //     ->get();

        //Saved jobs
        // $savedJobs = User::savedJobs()->latest()->take(5)->get();


        return view('user.dashboard', compact(
            'user',
            'applications',
            // 'recommendJobs',
            // 'savedJobs'
        ));
    }


}
