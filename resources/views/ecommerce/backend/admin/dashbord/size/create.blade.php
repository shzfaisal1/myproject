@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','size')
@section('content')

                          <h1>Coupon</h1>
                          <a href="{{route('coupon.list')}}"><button type="button" class="btn btn-success">back</button></a>
                           <div class="col-lg-10">
                                
                                   
                                        <hr>
                                        <form action="{{route('size.store')}}" method="post" novalidate="novalidate">
                                           @csrf
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">size</label>
                                                <input id="sizes" name="sizes" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            @error('size')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror
                                           
                                        
                                          
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    


                        @endsection