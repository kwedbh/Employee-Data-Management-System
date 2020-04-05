<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Employee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee = Employee::all();
        $latest_employee = Employee::orderBy('created_at','DESC')->limit(5)->get();
        $department = Department::all();
        return view('dashboard.index',['employee' => $employee,'department' => $department,'latest_employee' => $latest_employee]);
    }
}
