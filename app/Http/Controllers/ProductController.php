<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\product;
use App\Models\Product_Child_Image;
use App\Models\product_attribute;
use App\Models\product_Attribute_child_image;
use Validator;
use App\Models\size;
use DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
    $data=DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.category_name as Category')
        ->get();
        

        $size=DB::table('sizes')->get();
    return view('ecommerce\backend\admin\dashbord\product\list',compact('data','size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    { 
        $data=Category::all();
        $size=DB::table('sizes')->get();
        $colour=DB::table('colors')->get();

        return view('ecommerce\backend\admin\dashbord\product\create',compact('data','size','colour'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        public function product_attr(Request $request){
            

        
        }

    public function store(Request $request)
    {



        // echo "<pre>";
        // print_r($data);
        // die;

        $input = $request->all();
//   dd($input);
        //     echo "<pre>";
        // print_r($input);
        // die;
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $product_image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $product_image_name);
            $input['image'] = "$product_image_name";
        }

        $data= product::create($input);

        if($request->hasfile('product_child_image')) {
            foreach($request->file('product_child_image') as $file)
            {
                $destinationPath = 'images/';
                $name = $file->getClientOriginalName();
                $file->move($destinationPath, $name);  
                $imgData[] = $name;  
                $fileModal =new Product_Child_Image();
               
                $fileModal->product_id=$data->id;
                
               
                
            }
        
            $fileModal->product_child_image = json_encode($imgData);
            $fileModal->save();
    
           
        }

        // product_attribute
        $product_attribute=new product_attribute;
        if ($image = $request->file('attribute_image')) {
            $destinationPath = 'images/';
            $product_attr_image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $product_attr_image_name);
            $product_attribute['attribute_image'] = "$product_attr_image_name";

            
        }
        $product_attribute->product_id=$data->id;
       

        $product_attribute->sku=$request->sku;
        $product_attribute->price=$request->price;
        $product_attribute->quantity=$request->quantity;
        $product_attribute->size_id=$request->size_id;
        $product_attribute->color_id=$request->colour_id;

        $product_attribute->save();


        $product_Attribute_child_image =new product_Attribute_child_image();
       
       
        if($request->hasfile('product_Attribute_child_image')) {
            foreach($request->file('product_Attribute_child_image') as $file)
            {
                $destinationPath = 'images/';
                $name = $file->getClientOriginalName();
                $file->move($destinationPath, $name);  
                $imgData[] = $name;  
               
               
                
            }
            $product_Attribute_child_image->product_id=$data->id;
                
            $product_Attribute_child_image->product_attr_id=$product_attribute->id;
            $product_Attribute_child_image->product_attr_color_id= $product_attribute->color_id;
            $product_Attribute_child_image->product_attribute_child_image = json_encode($imgData);
        
            $product_Attribute_child_image->save();
    
           
        }
       


      
        

      


        return redirect('product/list')->with('added','product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data=product::findorFail($id);

    //    echo "<pre>";
    //    print_r($data);
    //    die;
       $Category=Category::all();

       return view('ecommerce\backend\admin\dashbord\product\edit',compact('data','Category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $data=product::findorFail($id);
       if ($image = $request->file('image')) {
        $destinationPath = 'images/';
        $product_image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $product_image_name);
        $data['image'] = "$product_image_name";
    }
       $data->category_id=$request->category_id;
       $data->name=$request->name;
       $data->slug=$request->slug;
       $data->brand=$request->brand;
       $data->model=$request->model;
       $data->short_desc=$request->short_desc;
       $data->desc=$request->desc;
       $data->keyword=$request->keyword;
       $data->technical_specification=$request->technical_specification;
       $data->uses=$request->uses;
       $data->warranty=$request->warranty;
     $data->save();

        return redirect('product/list')->with('updated','product has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


//         DB::table('products')
//         ->where('products.id', $id)
//   ->join('product__child__images', 'products.id', 'product__child__images.product_id')
//   ->query();


// we can delete two table value at once

  $data =DB::table('products')
  ->where('id', $id); 
    DB::table('product__child__images')->where('product_id', $id)->delete();                           
    $data->delete();
        // $data=product::findorFail($id)->delete();
        // $data2=Product_Child_Image::findorFail($id)->delete();

        //
            // $data=DB::table('products')
            // ->where('id','=',$id)
            // ->join('product__child__images as pc','products.id','=','pc.product_id');
            
            // $data->delete();
            
        return redirect('product/list')->with('deleted','product has been deleted');

    }
}
