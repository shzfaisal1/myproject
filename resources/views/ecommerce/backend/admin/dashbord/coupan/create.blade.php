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
                                                <input id="Title" name="Title" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            @error('Title')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Code</label>
                                                <input id="category_slug" name="Code" type="text" class="form-control cc-number identified visa" value="" data-val="true"
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
                                                <label for="cc-number" class="control-label mb-1">Calue</label>
                                                <input id="category_slug" name="Calue" type="number" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                              @error('Calue')
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