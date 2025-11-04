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

    public function edit($id){

        $job = Job::findOrFail($id);
        return view('employer.edit-job-details',compact('job'));
    }

    public function update(UpdateJobRequest $request, $id){

        $validated = $request->validated();
        $job = Job::findOrFail($id);

        $job->update($validated);

        return redirect()->route('employer.jobs.details',$job->id)->with('success','Job updated successfully');
    }

}
