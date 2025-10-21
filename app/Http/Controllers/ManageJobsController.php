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
            ->paginate(5);

        return view('employer.manage-jobs', compact(['manageJobs']));
    }
    public function viewApplicants($jobId)
    {
        $job = Job::with('jobApplication.user')->findOrFail($jobId);

        return view('employer.view-applications', compact(['job']));
    }

    public function updateStatus(Request $request, $id)
    {

        $request->validate([
            'status' => 'required|string|in:Pending,Reviewed,Shortlisted,Rejected,Hired'
        ]);

        $application = JobApplication::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return response()->json(['success' => True, 'status' => $application->status]);
    }
}
