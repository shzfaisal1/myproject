<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FrontController extends Controller
{
    //

    public function home(){

        $result['home_category']=DB::table('categories')->where('status','1')->where('is_home','1')->get();
       
        echo "<pre>";
        print_r( $result['home_category']);
     

        foreach($result['home_category'] as $list){

            $result['home_category'][$list->id]  =DB::table('products')->where('id',$list->id)->get();
            // echo "<pre>";
            // print_r($list);
            // die;                
        }
        echo "<pre>";
        print_r($result['home_category']);
        die; 
                        
return view('ecommerce.frontend.home',compact('result'));

    }
}
