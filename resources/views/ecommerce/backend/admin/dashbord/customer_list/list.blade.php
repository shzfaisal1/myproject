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
                                                <a href="javascript:void(0)" class="show_customer" id="{{$list->id}}"><button type="button" class="btn btn-warning" >View</button></a>
                                                </td>

                                                
                                            </tr>
                                            @endforeach
                                           
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>


<!-- modal medium -->
<div class="modal fade" id="userShowModal">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                        <p><strong>ID:</strong> <span id="user-id"></span></p>
                                            <p><strong>Name:</strong> <span id="user-name"></span></p>
                                            <p><strong>Email:</strong> <span id="user-email"></span></p>
                                            <p><strong>mobile_number:</strong> <span id="user-mobile_number"></span></p>
                                            <p><strong>address:</strong> <span id="user-address"></span></p>
                                            <p><strong>city:</strong> <span id="user-city"></span></p>
                                            <p><strong>state:</strong> <span id="user-state"></span></p>
                                            <p><strong>zip:</strong> <span id="user-zip"></span></p>
                                            <p><strong>company:</strong> <span id="user-company"></span></p>
                                            <p><strong>gstin:</strong> <span id="user-gstin"></span></p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Confirm</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal medium -->


<!-- 
                        <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Show User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>ID:</strong> <span id="user-id"></span></p>
                                            <p><strong>Name:</strong> <span id="user-name"></span></p>
                                            <p><strong>Email:</strong> <span id="user-email"></span></p>
                                            <p><strong>mobile_number:</strong> <span id="user-mobile_number"></span></p>
                                            <p><strong>address:</strong> <span id="user-address"></span></p>
                                            <p><strong>Email:</strong> <span id="user-city"></span></p>
                                            <p><strong>Email:</strong> <span id="user-state"></span></p>
                                            <p><strong>Email:</strong> <span id="user-zip"></span></p>
                                            <p><strong>Email:</strong> <span id="user-company"></span></p>
                                            <p><strong>Email:</strong> <span id="user-gstin"></span></p>
                                           

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div> -->



@endsection

@section('javascript')

<script>

$(document).ready(function(){

    $('.show_customer').click(function(e){
e.preventDefault();

  $.ajaxSetup({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
   });

let customer_id =$(this).attr('id');


$.ajax({

    url:'/customer/view/'+customer_id,
    type:'GET',
    datatype:'json',
    success:function(response){

        // console.log(response.name);
        $('#userShowModal').modal('show');

              $('#user-name').text(response.name);
              $('#user-email').text(response.email);
              $('#user-mobile_number').text(response.mobile_number);
              $('#user-address').text(response.address);
              $('#user-city').text(response.city);
              $('#user-state').text(response.state);
              $('#user-zip').text(response.zip);
              $('#user-company').text(response.company);
              $('#user-gstin').text(response.gstin);
             


 
    }
});

        }
    );
});
</script>

@endsection