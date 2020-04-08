@extends("layouts.main")

@section("content")

@php

$base =  basename($_SERVER['PHP_SELF']);

@endphp
<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Employees </h3>
            </div>           

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link " href="{{route('employee.index')}}">All</a>
                    </li>
                  @foreach($department AS $args)
                  <li class="nav-item">
                      <a class="nav-link <?php
                        if($args->name == $base){
                        print "active";
                      }?>" href="{{ route('employee.single',$args->name)}}">{{ $args->name }}</a>
                    </li>
                  @endforeach
                  </ul>

                    @if(count($employee) >= 1)
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Department</th>
                          <th scope="col">Location</th>
                          <th scope="col">Telephone</th>
                          <th scope="col">Salary</th>
                          <th scope="col">&nbsp;</th>
                          <th scope="col">&nbsp;</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($employee AS $args)                        
                          <tr>
                          <td>
                              <img src="{{asset('storage/cover_images/'.$args->cover_image)}}" class="mr-2 img-fluid" onError="this.onerror=null;this.src='{{asset('/img/noimage.jpg')}}';" alt="{{ $args->name }}"> {{ $args->name }}
                            </td>
                            <td> <label class="badge badge-gradient-success">{{ $args->department }} </label></td>
                            <td>
                              {{ $args->location }}
                            </td>
                            <td>  {{ $args->telephone }} </td>
                            <td>  {{ config('app.curr') }}<?php print number_format($args->salary,2) ?> </td>
                            <td> <a href="{{ route('employee.pay',$args->id) }}">Pay Now</a> </td> 
                            <td>                           <a class="float-left" href="{{ route('employee.edit',$args->id) }}">
                          <i class=" mdi mdi-grease-pencil " style="font-size:20px;"></i>
                          </a>
                           <a class="float-right" href="{{ route('employee.delete',$args->id) }}">
                           <i class="  mdi mdi-delete  " style="font-size:20px;"></i>
                           </a>

                           <span style="clear:both"></span> </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    <br>
                    </div>
                    {{ $employee -> links() }}                    
                    @else
                    <br>
                    <h4>No Result Found!</h4>
                    @endif            
                  </div>
                </div>
              </div>
            </div>

@endsection;            