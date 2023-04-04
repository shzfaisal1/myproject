@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','Coupon List')
@section('content')

<h3>Coupon List</h3>
<div class="row m-t-30">
    
                            <div class="col-md-12">
                            
                    @if($msg=Session::get('add'))
                    <div class="alert alert-primary" role="alert">
											{{$msg}}
										</div>
                                        @endif
                                         @if($msg=Session::get('delete'))
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
                                <a href="{{route('coupon')}}"><button type="button" class="btn btn-success">Add Coupon </button></a>
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>Title</th>
                                                <th>Code</th>
                                                <th>Value</th>
                                                <th>Type</th>
                                                <th>Minimum Order Amount</th>
                                                <th>Is One Time</th>

                                                <th>Action</th>
                                                <th>Action</th>
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            @php
                                           if( $list->is_one_time==1){
                                            $list->is_one_time= "yes"   ;
                                           }else{
                                            $list->is_one_time= "NO"   ;
                                           }
                                            @endphp
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->Title}}</td>
                                                <td>{{$list->Code}}</td>
                                                <td>{{$list->value}}</td>
                                                <td>{{$list->type}}</td>
                                                <td>{{$list->min_order_amt}}</td>
                                                <td>{{$list->is_one_time}}</td>
                                               


                                                <td><a href="{{url('coupon/edit')}}/{{$list->id}}"> <button type="button" class="btn btn-success">edit</button></a></td>

                                                <td><a href="{{url('coupon/delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                               @if($list->status== 1)
                                                <td><a href="{{url('coupon/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a></td>
                                               @elseif($list->status== 0)
                                                <td><a href="{{url('coupon/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a></td>
                                                @endif
                                            </tr>
                                            @endforeach
                                           
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>


@endsection