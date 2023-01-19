<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Brand::all();
        return view('ecommerce.backend.admin.dashbord.brand.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ecommerce.backend.admin.dashbord.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Brand();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/brand_image'), $filename);
            $data['image']= $filename;
        }
        $data->name=$request->name;
        $data->save();
        
        Brand::create($request->all());
        return redirect('brand/list')->with('added','brand has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data=Brand::findorFail($id);
       return view('ecommerce.backend.admin.dashbord.brand.edit',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data=Brand::findorFail($id);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/brand_image'), $filename);
            $data->image= $filename;
        }
        $data->name=$request->name;
        $data->save();


        return redirect('brand/list')->with('updated','Brand has been updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Brand::findorFail($id)->delete();
        return redirect('brand/list')->with('deleted','Brand has been deleted');
    }



    public function status($id,$status_digit){
       
        $data=Brand::findorFail($id);
        $data->status=$status_digit;

        $data->save();

        return redirect('brand/list')->with('status');

    }
}
