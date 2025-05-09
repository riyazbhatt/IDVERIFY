<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentHeadController extends Controller
{
    public function dashboard()
    {
        // For now, just return a simple view
        return view('department_head.dashboard');
    }

    public function appointments()
    {
        // For now, return a simple view for appointments
        return view('department_head.appointments');
    }
}
