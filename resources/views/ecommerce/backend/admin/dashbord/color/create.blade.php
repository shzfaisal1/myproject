@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','Add Color')
@section('content')

                          <h1>Add Color</h1>
                          <a href=""><button type="button" class="btn btn-success">back</button></a>
                           <div class="col-lg-10">
                                
                                   
                                        <hr>
                                        <form action="{{route('color.store')}}" method="post" novalidate="novalidate">
                                           @csrf
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Color</label>
                                                <input id="colours" name="colours" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            @error('colours')
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