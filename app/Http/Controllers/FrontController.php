<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FrontController extends Controller
{
    //

    public function home(){

        $result['home_category']=DB::table('categories')->where('status','1')->where('is_home','1')->get();
       
  

        foreach($result['home_category'] as $list){

                // its fecth product data according to their categoryid
                                         // this category id            product  according to their categoryid
            $result['home_category_product'][$list->id]  =DB::table('products')->where('category_id',$list->id)->get();

                
            foreach($result['home_category_product'][$list->id]  as $list1){
                // its fetching product attribute according to their product id

                $result['home_product_attr'][$list1->id]=DB::table('product_attribute')
               ->leftjoin('sizes','sizes.id','=','product_attribute.size_id')
               ->leftjoin('colors','colors.id','=','product_attribute.color_id')
                ->where('product_attribute.product_id',$list1->id)->get();

            }
            
            $result['home_brnad'] =DB::table('brands')->where('status','1')->get();
           
      
// 1
// there is two ways
// 2
        $result['feature_product']=DB::table('products')
        ->select('products.*','sizes.sizes as Size','colors.colours as Color','product_attribute.*')
        ->join('product_attribute','products.id','=','product_attribute.product_id')
        ->join('sizes','sizes.id','=','product_attribute.size_id')
        ->join('colors','colors.id','=','product_attribute.color_id')
        ->where(['products.is_featured'=>'1'])
        ->get();


        $result['trending_product']=DB::table('products')
        ->select('products.*','sizes.sizes as Size','colors.colours as Color','product_attribute.*')
        ->join('product_attribute','products.id','=','product_attribute.product_id')
        ->join('sizes','sizes.id','=','product_attribute.size_id')
        ->join('colors','colors.id','=','product_attribute.color_id')
        ->where(['products.is_tranding'=>'1'])
        ->get();


        $result['discounted_pro']=DB::table('products')->where('is_discounted','1')->get();

        foreach($result['discounted_pro'] as $dis_product){

            $result['is_discounted'][$dis_product->id]=DB::table('product_attribute')
            ->leftjoin('sizes','sizes.id','=','product_attribute.size_id')
            ->leftjoin('colors','colors.id','=','product_attribute.color_id')
             ->where('product_attribute.product_id',$dis_product->id)->get();
        }
      

        $result['home_banner']=DB::table('homebanner')->where('status','1')->get();
      
        }
     




      
        // Nested category functionality
        
        $result['main_cat']=DB::table('categories')->where('status','1')->where('parent_category_id','0')->get();
           
        foreach( $result['main_cat'] as $main_list){
         $result['sub_cat'][$main_list->id]=DB::table('categories')->where('parent_category_id',$main_list->id)->get();
        }

    
         
           
return view('ecommerce.frontend.home',compact('result'));

    }


  


    function productDetail($slug,$id){

        $result['product_detail']=DB::table('products')->where('slug','=',$slug)->get();
        foreach($result['product_detail'] as $data){
            $result['product_attr'][$data->id] =DB::table('product_attribute')
            ->join('sizes','sizes.id','product_attribute.size_id')
            ->join('colors','colors.id','product_attribute.color_id')
            ->where('product_id',$data->id)->get();

        }
        // echo"<pre>";
        // print_r($result);
        // die;
        // ->select('products.*','sizes.sizes as Size','colors.colours as Color','product_attribute.*','product__child__images.*')
        // ->join('product_attribute','product_attribute.product_id','=','products.id')
        // ->join('sizes','sizes.id','product_attribute.size_id')
        // ->join('colors','colors.id','product_attribute.color_id')
        // ->join('product__child__images','product__child__images.product_id','products.id')
        // ->where('products.slug',$slug)
        // ->get();
        

        $row=DB::table('product__child__images')->where('product_id',$id)->first();
        
        
        

        $images = json_decode($row->product_child_image);
        
    //     foreach ($images as $image) {
    //       echo"<pre>";
    //       print_r($image);
          
    //     }
        
    //    die();

   

    

   
 //related products functionality
    $result['related_product']=DB::table('products')
    ->select('products.*','sizes.sizes as Size','colors.colours as Color','product_attribute.*','product__child__images.*')
    ->join('product_attribute','product_attribute.product_id','=','products.id')
    ->join('sizes','sizes.id','product_attribute.size_id')
    ->join('colors','colors.id','product_attribute.color_id')
    ->join('product__child__images','product__child__images.product_id','products.id')
    ->where('category_id',$result['product_detail'][0]->category_id)
    ->where('slug','!=',$slug)
    ->get();

   
    // echo"<pre>";
    // print_r($result['related_product']);
    // die;

        $result['main_cat']=DB::table('categories')->where('status','1')->where('parent_category_id','0')->get();
           
        foreach( $result['main_cat'] as $main_list){
         $result['sub_cat'][$main_list->id]=DB::table('categories')->where('parent_category_id',$main_list->id)->get();
        }
        return view('ecommerce.frontend.product',compact('result','images'));
    }
}
