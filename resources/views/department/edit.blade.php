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
                  <div class="card-body">
                <form class="mb-5" action="{{ route('department.edit',$department->id) }}" method="POST">
                @csrf
                  <div class="row">
                    <div class="col-md-6 col-12">
                    <label for="name">Department Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}">
                    </div>
                  </div>
                  <br>

                  <button class="btn btn-danger" type="submit">Edit</button>
                </form>


                <caption style="caption-side:top" class="text-success">All Department</caption>
                  </div>
                </div>
              </div>
            </div>

@endsection;            