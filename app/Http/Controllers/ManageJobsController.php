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

    public function viewJobs(Request $request)
    {

        // Get filter value (featured / non-featured / all)
        $filter = $request->input('filter');

        if ($filter === 'featured') {
            $featuredJobs = Job::where('featured', 1)->get();
            $jobs = collect(); // empty
        } elseif ($filter === 'non-featured') {
            $jobs = Job::where('featured', 0)->get();
            $featuredJobs = collect(); // empty
        } else {
            // Default: show both
            $jobs = Job::where('featured', 0)->get();
            $featuredJobs = Job::where('featured', 1)->get();
        }

        return view('employer.view-jobs', compact('featuredJobs', 'jobs', 'filter'));
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

    public function destroy($id)
    {

        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->back()->with('message', 'Job deleted successfully');
    }
}
