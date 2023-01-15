@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','category edit')
@section('content')

                          <h1>Size Edit</h1>
                          
                           <div class="col-lg-10">
                                
                                   
                                        <hr>
                                        <form action="/size/update/{{$data->id}}" method="post" novalidate="novalidate">
                                          
                                           @csrf
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">size </label>
                                                <input id="sizes" name="sizes" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required value="{{$data->sizes}}">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            @error('sizes')
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