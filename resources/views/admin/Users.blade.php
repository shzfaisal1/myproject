@extends('admin.layouts.master')

        
@section('page-title','userslist')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @if($msg=Session::get('succesfull'))
                  <div class="alert alert-success">{{$msg}}</div>
                    @endif

                    @if($msg=Session::get('destroy'))
                 <div class="alert alert-danger">{{$msg}}</div>
                    @endif

                    @if($msg=Session::get('update'))
                <div class="alert alert-success">{{$msg}}</div>
                    @endif
                  <td> <button type="button" class="btn btn-primary"><a href="/users/form">Add Users</a> </button></td>
                    </p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> name </th>
                          <th> email</th>
                          <th> number </th>
                          <th> address </th>
                          <th> action </th>
                          <th> action </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($data as $list)
                        <tr>
                          <td>{{$list->id}}</td>
                          <td>{{$list->name}}</td>
                          <td> {{$list->email}} </td>
                          <td> {{$list->number}} </td>
                          <td> {{$list->address}} </td>
                          <td> <button type="button" class="btn btn-primary"><a href="/users/edit/{{$list->id}}">edit</a> </button></td>
                          <td> <button type="button" class="btn btn-warning"><a href="/users/delete/{{$list->id}}">delete</a></button> </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

@endsection