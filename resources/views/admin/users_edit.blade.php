@extends('admin.layouts.master')
@section('page-title','user_edit')
@section('content')

<div class="col-md-6 grid-margin stretch-card">

                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample"  method="post" action="/users/update/{{$data->id}}">
                        @csrf
                        @method('put')
                      <div class="form-group">
                        <label for="exampleInputUsername1">name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" value="{{$data->name}}" name="name" placeholder="Username">
                      </div>
                      @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"  value="{{$data->email}}" name="email" placeholder="Email">
                      </div>
                      @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      <div class="form-group">
                        <label for="exampleInputPassword1">Number</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" value="{{$data->number}}" name="number" placeholder="Password">
                      </div>
                      @error('number')
                <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection