<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        return view('admin.dashboard');
    }
    public function create(){

        $employers = Employer::all();
        return view('admin.manage-employers',compact(['employers']));
    }

    
}
