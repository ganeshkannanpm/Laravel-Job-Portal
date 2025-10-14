<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function index()
    {

        return view('employer.dashboard');
    }

    public function create()
    {

        return view('employer.post-job');
    }

    public function store(PostJobRequest $request)
    {
        $data = $request->validated();

        $data['employer_id'] = Auth::id();

        // Convert skills to JSON if needed
        if (isset($data['skills_required'])) {
            $data['skills_required'] = json_encode(explode(',', $data['skills_required']));
        }

        $data['posted'] = now()->format('Y-m-d');

        Job::create($data);

        return redirect()->route('employer.jobs.create')->with('success', 'Job posted successfully!');
    }

}
