<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index(){

        return view('user.experience');
    }

    public function create(){

        return view('user.create-experience');
    }
}
