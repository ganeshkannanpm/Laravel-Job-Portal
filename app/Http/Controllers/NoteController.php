<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'candidate_id' => 'required|exists:users,id',
            'job_id' => 'required|exists:jobs,id',
            'title' => 'required|string|max:255',
            'note' => 'required|string',
            'mode' => 'required|in:General,Feedback,Reminder,Follow-up',
            'reminder_date' => 'nullable|date',
            'status' => 'nullable|in:Pending,Completed',
        ]);

        Note::create([
            'employer_id' => auth('employer')->id(),
            'candidate_id' => $request->candidate_id,
            'job_id' => $request->job_id,
            'title' => $request->title,
            'note' => $request->note,
            'mode' => $request->mode,
            'reminder_date' => $request->reminder_date ?? null,
            'status' => $request->status ?? null,
            'created_by' => auth()->id() ?? auth('employer')->id()
        ]);

        return redirect()->back()->with('success', 'Note added successfully!');
    }

    public function destroy($id){

        $notes = Note::findOrFail($id);

        if($notes->employer_id !== auth('employer')->id()){
           return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $notes->delete();

        return redirect()->back()->with('success', 'Note deleted successfully.');
    }

}
