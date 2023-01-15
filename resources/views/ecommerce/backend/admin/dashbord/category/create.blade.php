@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','Create_Category')
@section('content')

                          <h1>Manage Category</h1>
                          <button type="button" class="btn btn-success"><a href="{{url('/category/list')}}">back</a></button>
                           <div class="col-lg-10">
                                
                                   
                                        <hr>
                                        <form action="{{route('category.insert')}}" method="post" novalidate="novalidate">
                                           @csrf
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Category </label>
                                                <input id="category_name" name="category_name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            @error('category_name')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Category Slug</label>
                                                <input id="category_slug" name="category_slug" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                              @error('category_name')
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