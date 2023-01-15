@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','Edit Product')
@section('content')

                          <h1>Add Product</h1>
                          <a href="{{url('/category/list')}}">  <button type="button" class="btn btn-success">back</button></a>
                           <div class="col-lg-10">
                                
                                   
                                        <hr>
                                        <form action="{{route('product.update',$data->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                           @csrf

                                           <div class="form-group has-success">
                                                <label for="category_id" class="control-label mb-1">Category </label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                <option  >please select category</option>
                                                       @foreach($Category as $list)
                                                     
                                         
                                                  @if($list->id ==$data->category_id)      
                                           <option value="{{$list->id}}" selected >{{$list->category_name}}</option>
                                        @else
                                           <option value="{{$list->id}}" >{{$list->category_name}}</option>

                                     
                                           
                                                @endif
                                                @endforeach
                                                   </select>
                                    
                                          
                                            </div>

                                           

                                            @error('category_name')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>

                                        @enderror
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">name </label>
                                                <input id="name" name="name"  value="{{$data->name}}" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            @error('name')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Product Image</label>
                                                <input id="image-upload" name="image" type="file" class="form-control cc-number identified visa"  value="{{$data->image}}"  data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                             
                                            <img src="{{asset('/images/'.$data->image)}}" width="300px">

                                            <img id="image-container" />

                                              @error('image')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror

                                        <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">slug</label>
                                                <input id="slug" name="slug" type="text" value="{{$data->slug}}" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                              @error('slug')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror


                                        <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">brand</label>
                                                <input id="brand" name="brand" type="text" value="{{$data->brand}}" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                              @error('brand')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror
                                                   

                                        <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">model</label>
                                                <input id="model" name="model" type="text" value="{{$data->model}}" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                              @error('brand')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror
                                       
                                        <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">short description</label>
                                                <textarea id="short_desc" name="short_desc"    type="text" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                    {{$data->short_desc}}
                                                </textarea>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                              @error('short_desc')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror


                                                     

                                        <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1"> description</label>
                                                <textarea id="desc" name="desc" type="text" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                    {{$data->desc}}
                                                </textarea>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                              @error('desc')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror
                                        
                                    



                                        
                                        
                                        <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">keyword</label>
                                                <input id="keyword" name="keyword" type="text" value="{{$data->keyword}}" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                              @error('keyword')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror



                                        <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">technical specification</label>
                                                <input id="technical_specification"   value="{{$data->technical_specification}}" name="technical_specification" type="text" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                              @error('technical_specification')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror
                                    

                                        <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">uses</label>
                                                <input id="uses" name="uses" type="text" value="{{$data->uses}}" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                              @error('uses')
                                            <div class="alert alert-danger" role="alert">
										{{$message}}
										</div>
                                        @enderror



                                        <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">warranty</label>
                                                <input id="warranty" name="warranty" type="text" value="{{$data->warranty}}" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                              @error('warranty')
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
<script>
                        $(document).ready(function(){
         
         /* This function will call when onchange event fired */         
         $("#image-upload").on("change",function(){
  
           /* Current this object refer to input element */          
           var $input = $(this);
           var reader = new FileReader(); 
           reader.onload = function(){
                 $("#image-container").attr("src", reader.result);
           } 
           reader.readAsDataURL($input[0].files[0]);
         });

         </script>