<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta name="_token" content="{{ csrf_token() }}">
</head>
<body>
​
<div class="container">
  <h2>Horizontal form</h2>
  <form  id="frm" method="post" > 
   
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">name:</label>
      <div class="col-sm-10">
        <input type="text" id="name" class="form-control" placeholder="Enter email" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control"  placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">number:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" placeholder="Enter email" name="number">
      </div>
    </div>
    </div>
   <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
    <select name="country" id="country" class="form-control-lg form-control">
              <option value="">Select Country</option>
              @if (!empty($data))
              
                  @foreach ($data as $list)
                      <option value="{{ $list->id }}">{{ $list->name }}</option>
                  @endforeach
              @endif
          </select>
      </div>
      <div class="mb-3">
                            <select name="state" id="state" class="form-control-lg form-control">
                                <option value="">Select State</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select name="city" id="city" class="form-control-lg form-control">
                                <option value="">Select City</option>
                            </select>
                        </div>
    
        <button type="submit" id="btn" class="btn btn-default">Submit</button>
        
      </div>
    </div>
  </form>
</div>

</body>
</html>
​<script>
  
$(document).ready(function(){
 
  $('#btn').click(function(event){
    event.preventDefault();
    $.ajaxSetup({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
   });
  
    $.ajax({
           url:"/save",
            type:"POST",
            data:$("#frm").serializeArray(),
            dataType:"json",
         success:function(response){
          if(response['status'] == 1) {
          console.log('inserted');
                }
       
      
    }
  });
  });  $('#country').change(function(e){

e.preventDefault;
$.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
    });
var country_id =$(this).val();

$.ajax({

url:'fetch/state/'+country_id,
type:'post',
datatype:'json',
success:function(response){ 
  $('#state').find('option:not(:first)').remove();
  if (response['states'].length > 0) {
                        $.each(response['states'], function(key,value){
                            $("#state").append("<option value='"+value['id']+"'>"+value['name']+"</option>")
                        });
                    } 
}

});

});

$('#state').change(function(e){
e.preventDefault();
var city_id=$(this).val();
$.ajax({
  url:'fetch/city/'+city_id,
  type:'post',
  datatype:'json',
  success:function(response){
    $('#city').find('option:not(:first)').remove();
    if(response['city'].length >0){
      $.each(response['city'],function(key,value){
        $('#city').append("<option value = '"+value['id']+"'>"+value['name']+"</option>")
      });
    }
  }
});
});
});

</script>
