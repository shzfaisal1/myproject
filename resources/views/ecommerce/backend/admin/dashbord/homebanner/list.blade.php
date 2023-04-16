@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','HomeBanner')

@section('content')
<h3>HomeBanner</h3>
<div class="row m-t-30">
    
                        @if($ms=Session::get('HomeAdded'))

                            <div class="alert alert-primary" role="alert">
                           {{Session::get('HomeAdded')}}
                            </div>
                        @endif

                        @if(Session::get('del'))
                        <div class="alert alert-danger"  role="alert">
                            
                        {{Session::get('del')}}
                        </div>
                        @endif
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                <a href="{{route('homebanner.create')}}"><button type="button" class="btn btn-success">Add Homebanner </button></a>
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>Image</th>
                                                <th>Url</th>
                                                <th>text</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $list)
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td><img src="{{asset('public/homebanner/'.$list->image)}}"></td>

                                                <td>{{$list->url}}</td>
                                                <td>{{$list->text}}</td>
                                                
                                                <td><a href="/homebanner/edit/{{$list->id}}"> <button type="button" class="btn btn-success">edit</button></a></td>

                                                <td><a href="/homebanner/delete/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                                @if($list->status==1)
                                                <td><a href="/homebanner/0/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a></td>
                                                @elseif($list->status==0)
                                                <td><a href="/homebanner/1/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a></td>
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