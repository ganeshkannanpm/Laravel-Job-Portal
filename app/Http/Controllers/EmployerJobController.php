<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class EmployerJobController extends Controller
{
    public function index($id)
    {
        $job = Job::findOrFail($id);
        return view('employer.job-details', compact('job'));
    }

    public function edit($id)
    {

        $job = Job::findOrFail($id);
        return view('employer.edit-job-details', compact('job'));
    }

    public function update(UpdateJobRequest $request, $id)
    {
        $validated = $request->validated();
        $job = Job::findOrFail($id);

        if (isset($validated['skills_required'])) {
            $decoded = json_decode($validated['skills_required'], true);
            $validated['skills_required'] = is_array($decoded) ? $decoded : [];
        }

        $job->update($validated);

        return redirect()->route('employer.jobs.details', $job->id)
            ->with('success', 'Job updated successfully');
    }


    public function destroy($id)
    {

        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('employer.view.jobs')->with('success', 'Job deleted successfully');

    }

}
