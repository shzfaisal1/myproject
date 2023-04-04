@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','Coupon Edit')
@section('content')

<h1>Coupon Edit</h1>
<a href="{{route('coupon.list')}}"><button type="button" class="btn btn-success">back</button></a>
<div class="col-lg-10">


    <hr>
    <form action="{{url('coupon/update')}}/{{$data->id}}" method="post" novalidate="novalidate">
        @csrf
        <div class="form-group has-success">
            <label for="cc-name" class="control-label mb-1">Title </label>
            <input id="Title" name="Title" type="text" class="form-control cc-name valid" value="{{$data->Title}}"
                data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name"
                aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required>
            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
        </div>
        @error('Title')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">Code</label>
            <input id="category_slug" name="Code" type="text" value="{{$data->Code}}"
                class="form-control cc-number  identified visa" data-val="true"
                data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('Code')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">Value</label>
            <input id="value" name="value" type="number" class="form-control cc-number identified visa"
                value="{{$data->value}}" data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('Calue')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror


        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="type" class="control-label mb-1">Type</label>
                    <select name="type" id="type" class="form-control">
               @if($data->type=="value")
                        <option value="value" selected>value</option>
                        <option value="per">per</option>
                        @elseif($data->type=="per")
                        <option value="value" >value</option>
                        <option value="per" selected>per</option>
                   @endif
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="cc-number" class="control-label mb-1">Minimum Order Amount</label>
                    <input id="min_order_amt" name="min_order_amt" type="text"
                        class="form-control cc-number identified visa" value="{{$data->min_order_amt}}" data-val="true"
                        data-val-required="Please enter the card number"
                        data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                </div>

                <div class="col-md-4">
                    <label for="is_one_time" class="control-label mb-1">Is One Time</label>
                    <select name="is_one_time" id="is_one_time" class="form-control">
                        @if($data->is_one_time==1)
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                        @elseif($data->is_one_time==0)
                        <option value="1" >Yes</option>
                        <option value="0" selected>No</option>
                        @endif
                    </select>
                </div>
            </div>
            <br>
            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Submit</span>
                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
            </div>
    </form>



    @endsection