<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Employee;
use App\Department;

class EmployeeController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $department = Department::orderBy('name') -> get();
        $employee = Employee::orderBy('name')->paginate(20);

        return view("employee.index",['employee' => $employee,'department' => $department]);
    }

    public function create()
    {
        $department = Department::all();
        return view("employee.create",['department' => $department]);
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $department = Department::all();
        return view("employee.edit",['employee' => $employee],['department' => $department]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'department' =>  'required',  
            'location' =>  'required|max:100',  
            'telephone' =>  'required|min:10|max:15',  
            'salary' =>  'required',
            'cover_image' => 'image|nullable|max:1999'
        
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $employee = new Employee();

        $employee->name = request('name');
        $employee->department = request('department');
        $employee->location = request('location');
        $employee->telephone = request('telephone');
        $employee->salary = request('salary');
        $employee->cover_image = $fileNameToStore;
        
        $employee->save();

        return redirect("/employee")->with('success',"Employee Created Successfully");
    }
    

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view("employee.show",['employee' => $employee]);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        if($employee->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$employee->cover_image);
        }
        
        return redirect("/employee")->with("success","Employee Deleted Successfully");
    }

    public function update_record(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'department' =>  'required',  
            'location' =>  'required|max:100',  
            'telephone' =>  'required|min:10|max:15',  
            'salary' =>  'required',
            'cover_image' => 'image|nullable|max:1999'
        
        ]);

        $employee = Employee::findOrFail($id);
        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/cover_images/'.$employee->cover_image);
        }

        $employee->name = request('name');
        $employee->department = request('department');
        $employee->location = request('location');
        $employee->telephone = request('telephone');
        $employee->salary = request('salary');
        if($request->hasFile('cover_image')){
            $employee->cover_image = $fileNameToStore;
        }

        $employee->save(); //this will UPDATE the record

        return redirect("/employee")->with("success","Account was updated successfully");
    }

    public function single($id)
    {
        $employee = Employee::where('department',$id)->orderBy('name') -> paginate(20);
        $department = Department::orderBy('name') -> get();

        return view('employee.single',['employee' => $employee,'department' => $department]);
    }
}
