@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','Brand')
@section('content')

<h3>Brand</h3>
<div class="row m-t-30">

    <div class="col-md-12">

        @if($msg=Session::get('deleted'))
        <div class="alert alert-danger">
            {{$msg}}
        </div>
        @endif
        <!-- is line ka matlab hai agar session ko milta hai ye to ye dikha -->
        @if($msg=Session::get('added'))                 
        <div class="alert alert-success">
            {{$msg}}
        </div>


        @endif

        @if($msg=Session::get('updated'))

<div class="alert alert-primary">
    {{$msg}}
</div>
    @endif


   


  
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <a href="{{route('create.brand')}}"><button type="button" class="btn btn-success">Add Brand </button></a>
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>

                        <th>name</th>
                        <th>image</th>
                        <th>Action</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->name}}</td>
                        
                        <td><img src="{{asset('public/brand_image/'.$list->image)}}" width="200px"></td>
                        <td><a href="/brand/edit/{{$list->id}}"> <button type="button"
                                    class="btn btn-success">edit</button></a></td>

                        <td><a href="/brand/delete/{{$list->id}}"><button type="button"
                                    class="btn btn-danger">Delete</button></a></td>
                        @if($list->status==1)
                        <td><a href="/brand/status/0/{{$list->id}}"><button type="button"
                                    class="btn btn-primary">Active</button></a></td>
                        @elseif($list->status==0)
                        <td><a href="/brand/status/1/{{$list->id}}"><button type="button"
                                    class="btn btn-warning">Deactive</button></a></td>
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