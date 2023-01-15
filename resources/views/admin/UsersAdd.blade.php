@extends('admin.layouts.master')

        
@section('page-title','userslist')

@section('content')

<div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample"  method="post" action="/users/store">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="name" placeholder="Username">
                      </div>
                      @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                      </div>
                      @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      <div class="form-group">
                        <label for="exampleInputPassword1">Number</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="number" placeholder="Password">
                      </div>
                      @error('number')
                      @enderror
                      <div class="form-group">
                        <label for="exampleInputPassword1">address</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="address">
                      </div>
                      @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>

@endsection