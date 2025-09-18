<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalInfoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalInfoController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        return view('user.personal-info', compact(['user']));
    }

    public function update(PersonalInfoRequest $request)
    {

        $validator = $request->validated();
        

    }
}
