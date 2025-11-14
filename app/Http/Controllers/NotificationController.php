<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {

        $notes = Note::where('candidate_id', auth('web')->id())->get();

        return view('user.notifications', compact('notes'));
    }

    public function destroy(Note $note)
    {

        if ($note->user_id === auth()->id()) {
            $note->delete();
        }

        return redirect()->back()->with('success', 'Notification deleted.');
    }
    public function clearAll()
    {
        auth()->user()->notes()->delete();
        return redirect()->back()->with('success', 'All notifications cleared.');
    }

}
