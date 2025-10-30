<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class EmployerJobController extends Controller
{
    public function index($id)
    {
        $job = Job::findOrFail($id);
        return view('employer.job-details', compact('job'));
    }

}
