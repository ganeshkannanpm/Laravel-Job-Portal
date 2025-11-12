<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index(){

        $experiences = Experience::where('user_id',auth()->id())->get();
        return view('user.experience',compact(['experiences']));
    }

    public function create(){

        return view('user.create-experience');
    }

    public function store(Request $request){

        $request->validate([
            'job_title'=> 'required|string|max:255',
            'company_name'=>'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'=>'required|date',
            'description'=>'required|string'
        ]);

        Experience::create([
            'job_title'=> $request->job_title,
            'company_name'=> $request->company_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description'=> $request->description,
            'user_id'=> auth()->id()
        ]);

        return redirect()->route('user.experience')->with('message', 'Experience added successfully');
      
    }

    public function edit($id){

        $experience = Experience::findOrFail($id);
        return view('user.edit-experience',compact(['experience']));
    }

    public function update(Request $request, $id){

        $request->validate([
            'job_title'=> 'required|string|max:255',
            'company_name'=>'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'=>'required|date',
            'description'=>'required|string'
        ]);

        $data = Experience::findOrFail($id);

        $data->update([
            'job_title'=> $request->job_title,
            'company_name'=> $request->company_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description'=> $request->description,
            // 'user_id'=> auth()->id()
        ]);

        return redirect()->route('user.experience')->with('message', 'Experience updated successfully');
    }

    public function destroy(Experience $experience){

        $experience->delete();

        return redirect()->route('user.experience')->with('message', 'Experience deleted successfully');

    }
}
