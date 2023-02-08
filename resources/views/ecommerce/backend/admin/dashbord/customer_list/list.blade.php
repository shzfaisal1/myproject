@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','Customer List')
@section('content')

<h3>Customer List</h3>
<div class="row m-t-30">
    
                            <div class="col-md-12">
                            
                    <!-- @if($msg=Session::get('added'))
                    <div class="alert alert-primary" role="alert">
											{{$msg}}
										</div>
                                        @endif
                                        @if($msg=Session::get('deleted'))
                    <div class="alert alert-danger" role="alert">
											{{$msg}}
										</div>
                                        @endif
                                        @if($msg=Session::get('updated'))
                    <div class="alert alert-success" role="alert">
											{{$msg}}
										</div> -->
                                        @endif
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                <!-- <a href="{{route('create.category')}}"><button type="button" class="btn btn-success">Add Category </button></a> -->
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customer_data as $list)
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->email}}</td>
                                                <td>{{$list->mobile_number}}</td>

                                                <td><a href="/category/edit/{{$list->id}}"> <button type="button" class="btn btn-success">edit</button></a></td>

                                                <td><a href="/customer/delete/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                                @if($list->status==1)
                                                <td><a href="/customer/status/0/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a></td>
                                                @elseif($list->status==0)
                                                <td><a href="/customer/status/1/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a></td>
                                                @endif
                                                <td>
                                                <a href=""><button type="button" class="btn btn-warning">View</button></a>
                                                </td>

                                                
                                            </tr>
                                            @endforeach
                                           
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>






@endsection