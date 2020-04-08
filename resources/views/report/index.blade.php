@extends("layouts.main")

@section("content")
<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span>Payment Report </h3>
            </div>           

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                  <form action="{{ route('report.index') }}" method="POST" >
                  @csrf

  
<div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Departments</label>
      <select name="department" required id="" class="form-control">
        <option selected disabled>Choose...</option>
        @foreach($departments AS $department)
        <option value="{{ $department->name }}">{{ $department->name }}</option>
        @endforeach
      </select>
    </div>   

    <div class="form-group col-sm-4">
      <label for="inputState">Month</label>
      <select name="start_month" required id="" class="form-control">
        <option selected>Choose...</option>
        @foreach($months AS $month => $value)
        <option value="{{ $month }}" 
            <?php 
            if($month == date('m')){
              print "selected";
            }

          ?>
        >{{ $value }}</option>
        @endforeach

      </select>
    </div> 
    <div class="form-group col-sm-4">
      <label for="inputState">Year</label>
      <select name="start_year" required id="inputState" class="form-control">
      <option selected>Choose...</option>
        @for($i=2020; $i <= 2030; $i++)
        <option  
        value = "{{ $i }}"
        
        <?php 
            if($i == date('Y')){
              print "selected";
            }

      ?>
        >{{ $i }}</option>
        @endfor;
      </select>
    </div> 
  </div>
  
   <br>
  <button type="submit" class="btn btn-primary">Search</button>
</form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'):?>

  <!-- Output Can be found under PaymentReportController -->

        <?php print $output ?>
      
      <?php endif;?>

                  </div>
                </div>
              </div>
            </div>

@endsection;            