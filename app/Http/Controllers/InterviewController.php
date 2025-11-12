<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function store(Request $request){

        $request->validate([
           'candidate_id' => 'required|exists:users,id',
            'job_id' => 'required|exists:jobs,id',
            'interview_date' => 'required|date',
            'interview_time' => 'required',
            'location' => 'nullable|string|max:255',
            'mode' => 'required|in:Online,In-Person',
        ]);

        Interview::create([
            'employer_id' => auth('employer')->id(),
            'candidate_id' => $request->candidate_id,
            'job_id' => $request->job_id,
            'interview_date' => $request->interview_date,
            'interview_time' => $request->interview_time,
            'location' => $request->location,
            'mode' => $request->mode,
        ]);

        return redirect()->back()->with('success', 'Interview scheduled successfully!');
    }
}
