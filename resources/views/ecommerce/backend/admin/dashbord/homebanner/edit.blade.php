@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','Edit Homebanner')
@section('content')
<h3>Edit Homebanner</h3>
<form action="/homebanner/update/{{$data->id}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
    @csrf
    <div class="form-group has-success">
        <label for="url" class="control-label mb-1">Url</label>
        <input id="url" name="url" type="text" value="{{$data->url}}" class="form-control cc-name valid" data-val="true"
            data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true"
            aria-invalid="false" aria-describedby="cc-name-error" required>
        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
    </div>


    <div class="form-group has-success">
        <label for="text" class="control-label mb-1">Text</label>
        <input id="text" name="text" type="text" class="form-control cc-name valid" value="{{$data->text}}" data-val="true"
            data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true"
            aria-invalid="false" aria-describedby="cc-name-error" required>
        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
    </div>


    <div class="form-group">
        <label for="image" class="control-label mb-1"> Brand Image</label>
        <input id="image" name="image" type="file" class="form-control cc-number identified visa" value=""
            data-val="true">
        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
    </div>
    <img src="{{asset('public/homebanner/'.$data->image)}}" width="200">
    <div>
        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
            <i class="fa fa-lock fa-lg"></i>&nbsp;
            <span id="payment-button-amount">Submit</span>
            
        </button>
    </div>
</form>



@endsection
