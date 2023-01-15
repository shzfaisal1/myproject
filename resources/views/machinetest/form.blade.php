<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <meta name="_token" content="{{ csrf_token() }}">
</head>
<body>

<div class="container">
<form action="{{url('/save/data')}}" method="post">
    @csrf
<div class="mb-3 mt-3">
    <label for="name" class="form-label">name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter email" name="name">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
  </div>
 
  <div class="mb-3 mt-3">
    <label class="form-check-label">
    country
    </label>
    <select class="form-select"   id="country" aria-label="Default select example" name="country_id">
    @if(!empty($countries))    
  <option selected>Open this select menu</option>
  @foreach($countries as $country)
  <option value="{{$country->id}}">{{$country->name}}</option>
  @endforeach
 @endif
</select>
  </div>
  <div class="mb-3 mt-3">
    <label class="form-check-label">
    state
    </label>
    <select class="form-select" id="state" aria-label="Default select example" name="state_id">
  <option > select state</option>
  
</select>
  </div>
  <div class="mb-3 mt-3">
    <label class="form-check-label">
    city
    </label>
    <select class="form-select" id="city" aria-label="Default select example" name="city_id">
  <option selected> select city</option>
 
</select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</body>
</html>


<script>
$(document).ready(function(){

$('#country').change(function(e){
e.preventDefault;
$.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
    });
var country_id= $(this).val();
$.ajax({

url:'fetch/state/'+country_id,
type:'post',
datatype:'json',
success:function(response){
    
if(response['state'].length > 0){
 $.each(response['state'],function(key,value){
        $("#state").append("<option value='"+value['id']+"'>" +value['name']+ "</option>")
 }
);
}
}
});
});

$("#state").change(function(e){
e.preventDefault;
var state_id=$(this).val();
$.ajax({

url:'fetch/city/'+state_id,
type:'post',
datatype:'json',
success:function(response){

    if(response['cities'].length> 0){

        $.each(response['cities'],function(key,value){
            $('#city').append("<option value='"+value['id']+"'>" +value['name']+ "</option>")
        }

        );
    }
}
});
});





});





</script>