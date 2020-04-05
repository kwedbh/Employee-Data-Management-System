@extends("layouts.main")

@section("content")
<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Department </h3>
            </div>           

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body text-info">
                  <h5>Department Name: {{ $department->name }}</h5>
                  <h5>Last Updated: {{ $department->updated_at }}</h5><br>
                <form class="" action="{{ route('department.show',$department->id) }}" method="POST">
                @csrf
                @method("DELETE")
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>

                  </div>
                </div>
              </div>
            </div>

@endsection;            