<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function index() {

        $skills = Skill::all();
        return view('user.skills', compact(['skills']));
    }

    public function store(Request $request){

        $request->validate([
            'name'=> 'required|string|max:255',
        ]);

        Skill::create([
            'user_id'=> Auth::id(),
            'name'=> $request->name
        ]);

        return redirect()->back()->with('success', 'Skill added successfully!');
    }

    public function destroy(Skill $skill){

        $skill->delete();
        return redirect()->back()->with('success', 'Skill deleted successfully!');
    }
}
