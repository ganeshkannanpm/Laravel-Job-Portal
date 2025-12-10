<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index(Request $request)
    {
        $query = CompanyProfile::query();

        // Search
        if ($request->filled('search')) {
            $query->where('company_name', 'like', '%' . $request->search . '%');
        }

        // Industry Filter
        if ($request->filled('industry') && $request->industry !== 'All') {
            $query->where('industry', $request->industry);
        }

        // Count jobs for each company
        $companies = $query->withCount('jobs')->get();

        return view('jobs.companies', compact('companies'));
    }

    public function viewCompany($employer_id)
{
    // Fetch the company profile using employer_id
    $profile = CompanyProfile::where('employer_id', $employer_id)->first();

    // If no profile found (optional handling)
    if (!$profile) {
        abort(404, 'Company not found');
    }

    return view('jobs.company-view', compact('profile'));
}

}
