<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Interview;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Note;
use App\Models\PersonalInfo;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class ManageCandidatesController extends Controller
{
    public function index(Request $request)
    {

        $query = JobApplication::query()->with('job');

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('job', function ($q2) use ($search) {
                        $q2->where('title', 'like', "%{$search}%");
                    });
            });
        }

        // Apply status filter
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $applications = $query->orderBy('id', 'desc')->paginate(5);
        $applications->appends($request->only(['search', 'status']));

        return view('employer.manage-candidates', compact('applications'));
    }

    public function create($id)
    {

        $application = JobApplication::findOrFail($id);
        $userId = $application->user_id;

        $job = Job::findOrFail($application->job_id);
        $candidate = User::findOrFail($userId);
        $personalInfo = PersonalInfo::where('user_id', $userId)->first();
        $experience = Experience::where('user_id', $userId)->get();
        $skills = Skill::where('user_id', $userId)->get();

        $interview = Interview::where('candidate_id', $candidate->id)
            ->where('job_id', $job->id)
            ->first();

        $notes = Note::where('candidate_id', $candidate->id)
            ->where('job_id', $job->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('employer.view-candidate', compact(
            [
                'candidate',
                'personalInfo',
                'application',
                'experience',
                'skills',
                'interview',
                'notes'
            ]
        ));
    }

    public function downloadResume($id)
    {
        $user = User::findOrFail($id);
        if (!$user->resume) {
            return back()->with('error', 'No resume uploaded yet!');
        }

        return response()->download(storage_path('app/public/resumes/' . $user->resume));
    }

}
