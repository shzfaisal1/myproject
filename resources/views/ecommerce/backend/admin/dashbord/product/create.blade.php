@extends('ecommerce\backend\admin\dashbord\layout\master')
@section('title','Create Product')
@section('content')

<h1>Add Product</h1>
<a href="{{url('/category/list')}}"> <button type="button" class="btn btn-success">back</button></a>
<div class="col-lg-10">


    <hr>
    <form action="{{route('product.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
        @csrf

        <div class="form-group has-success">
            <label for="category_id" class="control-label mb-1">Category </label>
            <select name="category_id" id="category_id" class="form-control">
                <option>please select category</option>
                @foreach($data as $list)


                <option value="{{$list->id}}">{{$list->category_name}}</option>
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
            <input id="name" name="name" type="text" class="form-control cc-name valid" data-val="true"
                data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true"
                aria-invalid="false" aria-describedby="cc-name-error" required>
            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
        </div>
        @error('name')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">Product Image</label>
            <input id="image-upload" name="image" type="file" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('image')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="form-group">
            <label for="prodduct_child_image" class="control-label mb-1">Product Child Image</label>
            <input id="product_child_image" name="product_child_image[]" type="file"
                class="form-control cc-number identified visa" value="" data-val="true" multiple>
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('product_child_image')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror


        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">slug</label>
            <input id="slug" name="slug" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('slug')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror


        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">brand</label>
            <input id="brand" name="brand" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('brand')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror


        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">model</label>
            <input id="model" name="model" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('brand')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">short description</label>
            <textarea id="short_desc" name="short_desc" type="text" class="form-control cc-number identified visa"
                value="" data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number"></textarea>
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('short_desc')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror




        <div class="form-group">
            <label for="cc-number" class="control-label mb-1"> description</label>
            <textarea id="desc" name="desc" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number"></textarea>
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('desc')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror







        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">keyword</label>
            <input id="keyword" name="keyword" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('keyword')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror



        <div class="form-group">
            <label for="cc-number" class="control-label mb-1"> Technical Specification</label>
            <textarea id="technical_specification" name="technical_specification" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number"></textarea>
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('technical_specification')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">uses</label>
            <input id="uses" name="uses" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('uses')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror



        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">warranty</label>
            <input id="warranty" name="warranty" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        @error('warranty')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="form-group">
            <div class="row">
            <div class="col-md-4">
        <label for="cc-number" class="control-label mb-1">Lead Time</label>
            <input id="lead_time" name="lead_time" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" 
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number"> 
            </div>

        <div class="col-md-4">
        <label for="cc-number" class="control-label mb-1">Tax</label>
            <input id="tax" name="tax" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
        </div>
       
            <div class="col-md-4">
            <label for="cc-number" class="control-label mb-1">Tax Type</label>
            <input id="tax_type" name="tax_type" type="text" class="form-control cc-number identified visa" value=""
                data-val="true" data-val-required="Please enter the card number"
                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-md-3">
            <label for="is_promo" class="control-label mb-1">Is Promo </label>
            <select name="is_promo" id="is_promo" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>


            
            </select>
            </div>
            
        <div class="col-md-3">
        <label for="is_featured" class="control-label mb-1">Is Featured </label>
            <select name="is_featured" id="is_featured" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>


            
            </select>
        </div>
       
        <div class="col-md-3">
        <label for="is_discounted" class="control-label mb-1">Is Discounted </label>
            <select name="is_discounted" id="is_discounted" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>


            
            </select>
        </div>

        <div class="col-md-3">
        <label for="is_tranding" class="control-label mb-1">Is Trending </label>
            <select name="is_tranding" id="is_tranding" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>


            
            </select>
        </div>
        </div>
        <!-- product attribute -->


        <br>


        <center>
       
            <!-- if there is multiple data to store use [] (its define it is an array) in name attribte  -->
        <h3 class="text-center title-2">Product Attribute</h3>
            <div class="col-lg-8">
            <button type="button" id="add" onclick="add_more()" class="btn btn-primary" style="margin-left: -387px;">Add
                            More
                            <i class="fa fa-plus"></i>
                        </button>

                <div class="card" id="product_attr">
               
                    <div class="card-body">
                      

                        <hr>

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">sku</label>
                            <input id="cc-pament" name="sku[]" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Image</label>
                                    <input id="image" name="attribute_image[]" type="file"
                                        class="form-control cc-name valid" data-val="true"
                                        data-val-required="Please enter the name on card" autocomplete="cc-name"
                                        aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                        data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="prodduct_child_image" class="control-label mb-1">Product Attribute Child
                                        Image</label>
                                    <input id="product_Attribute_child_image" name="product_Attribute_child_image[]"
                                        type="file" class="form-control cc-number identified visa" value=""
                                        data-val="true" multiple>
                                    <span class="help-block" data-valmsg-for="cc-number"
                                        data-valmsg-replace="true"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Price</label>
                            <input id="cc-number" name="price[]" type="number"
                                class="form-control cc-number identified visa" value="" data-val="true"
                                data-val-required="Please enter the card number"
                                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>

                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Quantity</label>
                            <input id="cc-number" name="quantity[]" type="number"
                                class="form-control cc-number identified visa" value="" data-val="true"
                                data-val-required="Please enter the card number"
                                data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group has-success">
                                    <label for="size_id" class="control-label mb-1">Size Id </label>
                                    <select name="size_id[]" id="size_id" class="form-control">

                                        @foreach($size as $list)
                                        <option value="{{$list->id}}">{{$list->sizes}}</option>




                                        @endforeach

                                    </select>


                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group has-success">
                                    <label for="category_id" class="control-label mb-1">Colour Id </label>
                                    <select name="colour_id[]" id="category_id" class="form-control">

                                        @foreach($colour as $colours)




                                        <option value="{{$colours->id}}">{{$colours->colours}}</option>

       
                                        @endforeach

                                    </select>


                                </div>




                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </center>






        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                <i class="fa fa-lock fa-lg"></i>&nbsp;
                <span id="payment-button-amount">Submit</span>
                <span id="payment-button-sending" style="display:none;">Sending…</span>
            </button>
        </div>
    </form>






    @endsection


    <!-- if ypu want to define variable in function its not consider 
    you have define out of function in any lan; -->
    @section('javascript')
 
    <script>


  

        let loop_count=1;
       
        function add_more(){
            // jitni baar click hoga count badhta rehga;
            loop_count++;
          var html='<div class="card" id="product_attr'+loop_count +'"> <div class="card-body">';
          html+='<h2> Product Attribute</h2>';
          html+='<button type="button" id="romove_attr"  class="btn btn-danger" style="margin-left: -387px;"  onclick=remove_more("'+loop_count+'")>Remove <i class="fa fa-minus"></i> </button>';
          html+='<div class="form-group"> <label for="cc-payment" class="control-label mb-1">sku</label> <input id="cc-pament" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false"> </div>'
          html+=' <div class="row"><div class="col-lg-6"><div class="form-group has-success"><label for="cc-name" class="control-label mb-1">Image</label><input id="image" name="attribute_image[]" type="file" class="form-control cc-name valid" data-val="true"data-val-required="Please enter the name on card" autocomplete="cc-name"aria-required="true" aria-invalid="false" aria-describedby="cc-name-error"><span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span></div></div><div class="col-lg-6"><div class="form-group"><label for="prodduct_child_image" class="control-label mb-1">Product Attribute Child Image</label><input id="product_Attribute_child_image" name="product_Attribute_child_image[]" type="file" class="form-control cc-number identified visa" value="" data-val="true" multiple><span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span> </div> </div></div>';                         
          html+='<div class="form-group"><label for="cc-number" class="control-label mb-1">Price</label><input id="cc-number" name="price[]" type="number"class="form-control cc-number identified visa" value="" data-val="true"data-val-required="Please enter the card number"data-val-cc-number="Please enter a valid card number" autocomplete="cc-number"><span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span></div>';
          html+='<div class="form-group"><label for="cc-number" class="control-label mb-1">Quantity</label><input id="cc-number" name="quantity[]" type="number"class="form-control cc-number identified visa" value="" data-val="true"data-val-required="Please enter the card number"data-val-cc-number="Please enter a valid card number" autocomplete="cc-number"><span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span></div>'; 
          html+='<div class="row"></div><div class="col-6"><div class="form-group has-success"><label for="size_id" class="control-label mb-1">Size Id </label><select name="size_id[]" id="size_id" class="form-control">@foreach($size as $list)<option value="{{$list->id}}">{{$list->sizes}}</option> @endforeach</select></div> </div><div class="col-6"><div class="form-group has-success"><label for="category_id" class="control-label mb-1">Colour Id </label><select name="colour_id[]" id="category_id" class="form-control">@foreach($colour as $colours)<option value="{{$colours->id}}">{{$colours->colours}}</option>@endforeach</select></div> </div>';                  
                            
                                
                 
          
          html+='</div></div>';
          $("#product_attr").append(html);
         

        }
        function remove_more(loop_count){


   $("#product_attr"+loop_count).remove();
}
    
    CKEDITOR.replace('short_desc');
    CKEDITOR.replace('desc');
    CKEDITOR.replace('technical_specification');


</script>
  
    @endsection