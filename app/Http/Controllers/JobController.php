<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\JobApplication;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all()->groupBy('featured');

        return view('jobs.index', [
            'featuredJobs' => $jobs->get(1, collect()), // default empty collection if missing
            'jobs' => $jobs->get(0, collect())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function latestJobs()
    {

        $totalJobs = Job::count();
        $totalCompanies = Job::distinct('company')->count('company');
        $totalApplicants = JobApplication::distinct('name')->count('name');

        $featuredJobs = Job::where('featured', 1)->paginate(9, ['*'], 'featured_page');
        $jobs = Job::where('featured', 0)->paginate(9, ['*'], 'jobs_page');

        return view('jobs.latest-jobs', compact(
            'featuredJobs',
            'jobs',
            'totalJobs',
            'totalCompanies',
            'totalApplicants'
        ));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.job-view', compact(['job']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
