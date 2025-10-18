<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class ManageJobsController extends Controller
{
    public function index()
    {
        $manageJobs = Job::withCount('jobApplication')
            ->has('jobApplication')
            ->paginate(6);
        return view('employer.manage-jobs', compact(['manageJobs']));
    }
    public function create()
    {

        return view('employer.view-applications');
    }
}
