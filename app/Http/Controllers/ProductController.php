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
use Illuminate\Support\Str;
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

       

        // dd($data->id);
        $attribute_image=$request->attribute_image;
        $product_Attribute_child_image=$request->product_Attribute_child_image;
        $sku=$request->sku;
        $price=$request->price;
        $quantity=$request->quantity;
        $size_id=$request->size_id;
        $colour_id=$request->colour_id;

        $product_attribute=array();

         // through sku(data)[jitna sku rahega ustni bar run hoga]
        if (is_array($sku) || is_object($sku))
{

   


        foreach($sku as $key=>$value){

            $product_attribute['product_id']=$data->id;
            $product_attribute['sku']=$sku[$key];
            $product_attribute['price']=$price[$key];
            $product_attribute['quantity']=$quantity[$key];
            $product_attribute['size_id']=$size_id[$key];
            $product_attribute['color_id']=$colour_id[$key];

            if($request->hasFile("attribute_image.$key")){
                $rand=rand('111111111','999999999');
                $attr_image=$request->file("attribute_image.$key")->getClientOriginalName();
                // $ext=$attr_image->extension();
                $destinationPath = 'product_attr/';
                // $image_name=$rand.'.'.$ext;
               
                // $request->file("attribute_image.$key")->storeAs('/public/media',$image_name);
                $request->file("attribute_image.$key")->move($destinationPath,$attr_image);
            $product_attribute['attribute_image']=$attr_image;

               
            }
            DB::table('product_attribute')->insert($product_attribute);

            
    
        
     $inserted_data =  DB::table('product_attribute')->orderBy('id','desc')->first();
 
     $inserted_id = $inserted_data->id;

   
    
        }

        // product__attribute_child_image is me sirf latest id store ho raha hai isko resolve krna hai

        if ($files = $request->file('product_Attribute_child_image')){
            $gallery=array();
            foreach ($files as $file){
                
                $image_name =time().$file->getClientOriginalName();
                $file->move('images/',$image_name);
                $gallery['product_Attribute_child_image'] = $image_name;
                $gallery['product_id']=$data->id;
                $gallery['product_attr_id'] =$inserted_id;
                DB::table('product__attribute_child_image')->insert($gallery);
              
           
            }
            
        }

     
    }
  





    // product attribute child image code
   
  
 
        
        

   
      
        

      


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