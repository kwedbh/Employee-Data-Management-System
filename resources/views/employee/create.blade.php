@extends("layouts.main")

@section("content")

<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span>New Employee </h3>
            </div>           

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                  <form action="{{ route('employee.create') }}" method="POST" enctype="multipart/form-data">
                  @csrf
  <div class="form-row"> 
    <div class="form-group col-md-6">
      <label for="name">Fullname</label>
      <input required type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group col-md-6">
      <label for="department">Department</label>
      <select required id="department" class="form-control" name="department">
        <option selected disabled>Choose...</option>
        @foreach($department AS $args)
        <option value = "{{$args->name}}" >{{$args->name}}</option>
        @endforeach;
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="location">Address</label>
    <input required type="text" class="form-control" id="location" placeholder="1234 Main St" name="location" value="{{ old('location') }}">
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="telephone">Telephone</label>
      <input name="telephone" required type="number" class="form-control" id="telephone" value="{{ old('telephone') }}">
    </div>
    <div class="form-group col-md-6">
      <label for="salary">Salary</label>
      <input name="salary" required type="number" class="form-control" id="salary" value="{{ old('salary') }}">
    </div>
  </div>

  <div class="form-row">
  <label> Choose Photo / Passport (Optional)</label>
  <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile" name="cover_image">
  <label class="custom-file-label" for="customFile">Choose</label>
</div>
</div> <br>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
                  </div>
                </div>
              </div>
            </div>

@endsection;            