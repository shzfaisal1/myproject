@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','Product List')
@section('content')

<h3>Category</h3>
<div class="row m-t-30">
    
                            <div class="col-md-12">
                            
                    @if($msg=Session::get('added'))
                    <div class="alert alert-primary" role="alert">
											{{$msg}}
										</div>
                                        @endif
                                        <@if($msg=Session::get('deleted'))
                    <div class="alert alert-danger" role="alert">
											{{$msg}}
										</div>
                                        @endif
                                        @if($msg=Session::get('updated'))
                                    <div class="alert alert-success" role="alert">
											{{$msg}}
										</div>
                                        @endif 
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                <a href="{{route('product.create')}}"><button type="button" class="btn btn-success">Add Product </button></a>
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>Category</th>
                                                <th>name</th>
                                                <th>image</th>
                                                <th>slug</th>
                                                
                                                <th>Action</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->Category}}</td>
                                                <td>{{$list->name}}</td>
                                                <td><img src="{{asset('/images/'.$list->image)}}" width="200px"></td>
                                                <td>{{$list->slug}}</td>
                                               
                                               


                                                <td><a href="{{route('product.edit',$list->id)}}"> <button type="button" class="btn btn-success">edit</button></a></td>

                                                <td><a href="{{route('product.delete',$list->id)}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                              
                                                

                                                
                                            </tr>
                                            @endforeach
                                           
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>


                @endsection