@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','Create_Category')
@section('content')

<h1>Coupon</h1>
<a href="{{route('coupon.list')}}"><button type="button" class="btn btn-success">back</button></a>
<div class="col-lg-10">


    <hr>
    <form action="{{route('coupon.store')}}" method="post" novalidate="novalidate">
        @csrf
        <div class="form-group has-success">
            <label for="cc-name" class="control-label mb-1">Title </label>
            <input id="Title" name="Title" type="text" class="form-control cc-name valid" data-val="true"
                data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true"
                aria-invalid="false" aria-describedby="cc-name-error" required>
            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
        </div>
        @error('Title')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">Code</label>
            <input id="category_slug" name="Code" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('Code')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">value</label>
            <input id="category_slug" name="value" type="number" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('value')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                <label for="type" class="control-label mb-1">Type</label>
            <select name="type" id="type" class="form-control">          
                                
                <option value="value">value</option>
                <option value="per">per</option>

            </select>
                </div>

                <div class="col-md-4">
                    <label for="cc-number" class="control-label mb-1">Minimum Order Amount</label>
                    <input id="min_order_amt" name="min_order_amt" type="text" class="form-control cc-number identified visa" value=""
                        data-val="true" data-val-required="Please enter the card number"
                        data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                </div>

                <div class="col-md-4">
                <label for="is_one_time" class="control-label mb-1">Is One Time</label>
            <select name="is_one_time" id="is_one_time" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>


            
            </select>
                </div>
            </div>
        <div>
            <br>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                <i class="fa fa-lock fa-lg"></i>&nbsp;
                <span id="payment-button-amount">Submit</span>
                <span id="payment-button-sending" style="display:none;">Sending…</span>
            </button>
        </div>



    </form>



    @endsection