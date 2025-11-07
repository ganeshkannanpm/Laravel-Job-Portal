<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class ManageCandidatesController extends Controller
{
    public function index(Request $request)
{
    // load related job title
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

    // Get results (you can add pagination if you want)
    $applications = $query->orderBy('id', 'desc')->paginate(10);

    return view('admin.candidates', compact('applications'));
}

}
