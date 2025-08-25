<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobManagementController extends Controller
{
    public function index(){

        $jobs = Job::latest()->get();

        return view('user.job-list', [
            'featuredJobs' => $jobs,
            'user' => auth()->user(),
        ]);
    }

    public function jobApplication() {

        return view('user.job-application');
    }
}
