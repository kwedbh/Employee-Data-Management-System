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
                <form class="mb-5" action="{{ route('department.index') }}" method="POST">
                @csrf
                  <div class="row">
                    <div class="col-md-6 col-12">
                    <label for="name">Department Name</label>
                      <input type="text" class="form-control" id="name" name="name" required 
                      value="{{ old('name') }}">
                    </div>
                  </div>
                  <br>

                  <button class="btn btn-danger" type="submit">Create</button>
                </form>


                <caption style="caption-side:top" class="text-success">All Department</caption>
                    <hr>
                    @if(count($department) >= 1)
                    <div class="table-responsive">
                    <table class="table table-bordered text-primary">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Department Name</th>
                          <th scope="col">&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i = 1; ?>
                      @foreach($department AS $args)
                        <tr>
                          <th scope="row"><?php print $i++; ?></th>
                          <td>{{$args->name}}</td>
                          <td><a class="float-left" href="{{ route('department.edit',$args->id) }}">
                          <i class=" mdi mdi-grease-pencil " style="font-size:20px;"></i>
                          </a>
                           <a class="float-right" href="{{ route('department.show',$args->id) }}">
                           <i class="  mdi mdi-delete  " style="font-size:20px;"></i>
                           </a>

                           <span style="clear:both"></span>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    </div>
                    <br>

                    {{ $department->links() }}
                    @else
                    <h4>No Result Found</h4>
                    @endif
                  </div>
                </div>
              </div>
            </div>

@endsection;            