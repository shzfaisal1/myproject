@extends('ecommerce.frontend.layout.master')
@section('title',$result['product_detail'][0]->name)
@section('content')

<section id="aa-product-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-product-details-area">
                    <div class="aa-product-details-content">
                        <div class="row">
                            <!-- Modal view slider -->
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="aa-product-view-slider">


                                    <div id="demo-1" class="simpleLens-gallery-container">
                                        <div class="simpleLens-container">
                                            <div class="simpleLens-big-image-container"><a
                                                    data-lens-image="{{asset('/images/'.$result['product_detail'][0]->image)}}"
                                                    class="simpleLens-lens-image">
                                                    <img src="{{asset('/images/'.$result['product_detail'][0]->image)}}"
                                                        class="simpleLens-big-image"></a>
                                            </div>
                                        </div>
                                        <div class="simpleLens-thumbnails-container">


                                            @foreach($images as $child_image)

                                            <a data-big-image="{{asset('/images/'.$child_image)}}"
                                                data-lens-image="{{asset('/images/'.$child_image)}}"
                                                class="simpleLens-thumbnail-wrapper" href="#">
                                                <img src="{{asset('/images/'.$child_image)}}" width="100px">
                                            </a>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Modal view content -->
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="aa-product-view-content">


                                    <h3>{{$result['product_detail'][0]->name}}</h3>

                                    <div class="aa-price-block">
                                        <span
                                            class="aa-product-view-price">{{$result['product_attr'][$result['product_detail'][0]->id][0]->price}}</span>
                                        <p class="aa-product-avilability">Avilability: <span>In stock</span></p>

                                    </div>
                                    <p>{!!$result['product_detail'][0]->short_desc!!}</p>

                                    <h4>Size</h4>
                                    <div class="aa-prod-view-size">
                                        @foreach($result['product_attr'][$result['product_detail'][0]->id] as $sizes)
                                        <a href="#" onclick="show_color('{{$sizes->sizes}}')">{{$sizes->sizes}}</a>
                                        @endforeach
                                    </div>
                                    
                                    <h4>Color</h4>
                                    <div class="aa-color-tag">
                                        @foreach($result['product_attr'][$result['product_detail'][0]->id] as $colors)
                                        @foreach($result['product_attr'][$result['product_detail'][0]->id] as $sizeslist)

                                        <a href="#" class="aa-color color_product" style="background:{{$colors->colours}}"
                                            onclick='color_change("{{asset('/images/'.$result['product_attr'][$result['product_detail'][0]->id][0]->attribute_image)}}")' id="{{$sizeslist->sizes}}"></a>
                                            <!-- <img src="{{asset('/product_attr/'.$result['product_attr'][$result['product_detail'][0]->id][0]->attribute_image)}}"
                                                        class="simpleLens-big-image"></a> -->
                                                        @endforeach
                                                        @endforeach
                                       
                                    </div>
                                    <div class="aa-prod-quantity">
                                        <form action="">
                                            <select id="" name="">
                                                <option selected="1" value="0">1</option>
                                                <option value="1">2</option>
                                                <option value="2">3</option>
                                                <option value="3">4</option>
                                                <option value="4">5</option>
                                                <option value="5">6</option>
                                            </select>
                                        </form>
                                        <p class="aa-prod-category">
                                            Model: <a href="#">{{$result['product_detail'][0]->model}}</a>
                                        </p>
                                    </div>

                                    <div class="aa-prod-view-bottom">
                                        <a class="aa-add-to-cart-btn" href="#">Add To Cart</a>
                                        <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                                        <a class="aa-add-to-cart-btn" href="#">Compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aa-product-details-bottom">
                        <ul class="nav nav-tabs" id="myTab2">
                            <li><a href="#description" data-toggle="tab">Description</a></li>
                            <li><a href="#review" data-toggle="tab">Reviews</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="description">
                                @foreach($result['product_detail'] as $desc)
                                <p>{!!$desc->desc !!}</p>
                                @endforeach
                            </div>
                            <div class="tab-pane fade " id="review">
                                <div class="aa-product-review-area">
                                    <h4>2 Reviews for T-Shirt</h4>
                                    <ul class="aa-review-nav">
                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="img/testimonial-img-3.jpg"
                                                            alt="girl image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March
                                                            26, 2016</span></h4>
                                                    <div class="aa-product-rating">
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star-o"></span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="img/testimonial-img-3.jpg"
                                                            alt="girl image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March
                                                            26, 2016</span></h4>
                                                    <div class="aa-product-rating">
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star-o"></span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <h4>Add a review</h4>
                                    <div class="aa-your-rating">
                                        <p>Your Rating</p>
                                        <a href="#"><span class="fa fa-star-o"></span></a>
                                        <a href="#"><span class="fa fa-star-o"></span></a>
                                        <a href="#"><span class="fa fa-star-o"></span></a>
                                        <a href="#"><span class="fa fa-star-o"></span></a>
                                        <a href="#"><span class="fa fa-star-o"></span></a>
                                    </div>
                                    <!-- review form -->
                                    <form action="" class="aa-review-form">
                                        <div class="form-group">
                                            <label for="message">Your Review</label>
                                            <textarea class="form-control" rows="3" id="message"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="example@gmail.com">
                                        </div>

                                        <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Related product -->
                    <div class="aa-product-related-item">
                        <h3>Related Products</h3>
                        <ul class="aa-product-catg aa-related-item-slider">
                            <!-- start single product item -->



                            <!-- start single product item -->
                            @foreach($result['related_product'] as $feature_product)
                            <li>
                                <figure>
                                    <a class="aa-product-img"
                                        href="{{url('product/'.$feature_product->slug.'/'.$feature_product->id)}}"><img
                                            src="{{asset('/images/'.$feature_product->image)}}"
                                            alt="{{$feature_product->name}}"></a>
                                    <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To
                                        Cart</a>
                                    <figcaption>
                                        <h4 class="aa-product-title"><a href="#">{{$feature_product->name}}</a></h4>
                                        <span class="aa-product-price">Rs {{$feature_product->price}}</span><span
                                            class="aa-product-price"><del>mrp {{$feature_product->mrp}}</del></span>
                                    </figcaption>
                                </figure>


                            </li>
                            @endforeach
                        </ul>
                        <!-- quick view modal -->
                        <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                        <div class="row">
                                            <!-- Modal view slider -->
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="aa-product-view-slider">
                                                    <div class="simpleLens-gallery-container" id="demo-1">
                                                        <div class="simpleLens-container">
                                                            <div class="simpleLens-big-image-container">
                                                                <a class="simpleLens-lens-image"
                                                                    data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                                                    <img src="img/view-slider/medium/polo-shirt-1.png"
                                                                        class="simpleLens-big-image">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="simpleLens-thumbnails-container">
                                                            <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                                                data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                                                <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                                            </a>
                                                            <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                                                data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                                                <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                                            </a>

                                                            <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                                                data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                                                <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal view content -->
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="aa-product-view-content">
                                                    <h3>T-Shirt</h3>
                                                    <div class="aa-price-block">
                                                        <span class="aa-product-view-price">$34.99</span>
                                                        <p class="aa-product-avilability">Avilability: <span>In
                                                                stock</span></p>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Officiis animi, veritatis quae repudiandae quod nulla porro
                                                        quidem, itaque quis quaerat!</p>
                                                    <h4>Size</h4>
                                                    <div class="aa-prod-view-size">
                                                        <a href="#">S</a>
                                                        <a href="#">M</a>
                                                        <a href="#">L</a>
                                                        <a href="#">XL</a>
                                                    </div>
                                                    <div class="aa-prod-quantity">
                                                        <form action="">
                                                            <select name="" id="">
                                                                <option value="0" selected="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="2">3</option>
                                                                <option value="3">4</option>
                                                                <option value="4">5</option>
                                                                <option value="5">6</option>
                                                            </select>
                                                        </form>
                                                        <p class="aa-prod-category">
                                                            Category: <a href="#">Polo T-Shirt</a>
                                                        </p>
                                                    </div>
                                                    <div class="aa-prod-view-bottom">
                                                        <a href="#" class="aa-add-to-cart-btn"><span
                                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                        <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                        <!-- / quick view modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('js')
<script>
function color_change(img) {
    $(".simpleLens-big-image-container").html('<a data-lens-image=src="'+img+'" class="simpleLens-lens-image"> <img src="'+img+'"  class="simpleLens-big-image"></a>');
}
function show_color(size){
    $(".color_product").hide();
    $("#"+size).show();

}
</script>


@endsection