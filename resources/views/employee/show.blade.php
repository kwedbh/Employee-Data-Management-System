@extends("layouts.main")

@section("content")
<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Employee </h3>
            </div>           

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body text-info">
                  <h5>Employee Name: {{ $employee->name }}</h5>
                  <h5>Department: {{ $employee->department }}</h5>
                  <h5>Location: {{ $employee->location }}</h5>
                  <h5>Telephone: {{ $employee->telephone }}</h5>
                  <h5>Salary: {{ $employee->salary }}</h5>
                  <h5>Date Created: {{ $employee->created_at }}</h5>
                  <h5>Last Updated: {{ $employee->updated_at }}</h5><br>
                <form class="" action="{{ route('employee.delete',$employee->id) }}" method="POST">
                @csrf
                @method("DELETE")
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>

                  </div>
                </div>
              </div>
            </div>

@endsection;            