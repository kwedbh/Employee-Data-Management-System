@extends("layouts.main")

@section("content")
<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Pay <?php print ucfirst(strtolower($employee->name)); ?> </h3>
            </div>           

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">

            <div class="text-center mb-5">
            <img style="width:230px; height:230px;" class="img-fluid rounded-circle" src="{{ asset('storage/cover_images/'.$employee->cover_image) }}" alt="{{ $employee->name }}" onError="this.onerror=null;this.src='{{asset('/img/noimage.jpg')}}';">
            
            </div>

<form action="{{ route('employee.pay',$employee->id) }}" method="POST">
                  @csrf
  <div class="form-row"> 
    <div class="form-group col-sm-6">
      <label for="name">Fullname</label>
      <input readonly required type="text" class="form-control" id="name" value="{{ $employee->name }}">
    </div>
    <div class="form-group col-sm-6">
      <label for="department">Department</label>
      <input readonly required type="text" class="form-control" id="department" value="{{ $employee->department }}">
    </div>
  </div>

  <div class="form-row"> 
    <div class="form-group col-sm-6">
      <label for="salary">Salary</label>
      <input readonly required type="text" class="form-control" id="salary" 
      value="{{ config('app.curr') }}<?php print number_format($employee->salary,2) ?>">
    </div>
    <div class="form-group col-sm-6">
      <label for="amount_paying">Amount Paying</label>
      <input required type="number" class="form-control" id="amount_paying" value="{{ old('amount_paying') }}" name="amount_paid">
    </div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Remark</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remark">Completely Paid</textarea>
  </div>
 <br>

  <button type="submit" class="btn btn-primary">Pay Now</button>
</form>
                  </div>
                </div>
              </div>
            </div>

@endsection;            