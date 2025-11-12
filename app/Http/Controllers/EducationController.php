<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {

        $educations = Education::where('user_id',auth()->id())->get();
        return view('user.education', compact(['educations']));
    }

    public function create()
    {

        return view('user.create-education');
    }

    public function store(Request $request)
    {

        $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_year' => 'required|date',
            'end_year' => 'required|date',
            'details' => 'required|string'
        ]);

        Education::create([
            'degree' => $request->degree,
            'institution' => $request->institution,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
            'details' => $request->details,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('user.education')->with('message', 'Education added successfully');

    }

    public function edit($id)
    {

        $education = Education::findOrFail($id);
        return view('user.edit-education', compact(['education']));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_year' => 'required|date',
            'end_year' => 'required|date',
            'details' => 'required|string'
        ]);

        $data = Education::findOrFail($id);

        $data->update([
            'degree' => $request->degree,
            'institution' => $request->institution,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
            'details' => $request->details,
        ]);

        return redirect()->route('user.education')->with('message', 'Education updated successfully');
    }

    public function destroy(Education $education)
    {

        $education->delete();

        return redirect()->route('user.education')->with('message', 'Education deleted successfully');

    }
}
