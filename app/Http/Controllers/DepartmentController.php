<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $department = Department::orderBy('name')->paginate(10);

        return view("department.index",['department' => $department]);
    }
 
    public function store(Request $request)
    {

        $this->validate($request,[ 'name' => 'required|max:30'           
            ]);

        $department = new Department();

        $department->name = request('name');
        
        $department->save();

        return redirect("/department")->with("success","Department Created Successfully");
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view("department.show",['department' => $department]);
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        
        return redirect("/department")->with("success","Department Deleted Successfully");
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view("department.edit",['department' => $department]);
    }

    public function update_record($id)
    {
        $department = Department::findOrFail($id);

        $department->name = request('name');

        $department->save(); //this will UPDATE the record with id=1

        return redirect("/department")->with("success","Department Updated Successfully");
    }
}
