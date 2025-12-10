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


}
