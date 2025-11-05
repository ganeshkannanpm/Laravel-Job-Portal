<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class ManageJobsController extends Controller
{
    public function index()
    {
        $employer = auth('employer')->user();

        $manageJobs = Job::withCount('jobApplication')
            ->where('employer_id', $employer->id)
            ->has('jobApplication')
            ->paginate(5);

        return view('employer.manage-jobs', compact(['manageJobs']));
    }

    public function viewJobs(Request $request)
    {

        $employer = auth('employer')->user(); 
        $filter = $request->input('filter');

        if ($filter === 'featured') {
            // Only featured jobs for this employer
            $featuredJobs = Job::where('employer_id', $employer->id)
                ->where('featured', 1)
                ->get();

            $jobs = collect(); // empty collection

        } elseif ($filter === 'non-featured') {
            // Only non-featured jobs for this employer
            $jobs = Job::where('employer_id', $employer->id)
                ->where('featured', 0)
                ->get();

            $featuredJobs = collect(); // empty collection

        } else {
            // Default: show both featured and non-featured jobs for this employer
            $jobs = Job::where('employer_id', $employer->id)
                ->where('featured', 0)
                ->get();

            $featuredJobs = Job::where('employer_id', $employer->id)
                ->where('featured', 1)
                ->get();
        }

        return view('employer.view-jobs', compact('featuredJobs', 'jobs', 'filter',));
    }

    public function viewApplicants($jobId)
    {
        $employer = auth('employer')->user();
        $job = Job::with('jobApplication.user')->findOrFail($jobId);

        $totalApplicants = JobApplication::whereHas('job', function ($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })->count();

        return view('employer.view-applications', compact(['job','totalApplicants']));
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
