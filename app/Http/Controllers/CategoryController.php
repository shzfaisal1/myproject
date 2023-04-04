<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use validator;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::all();
        return view('ecommerce.backend.admin.dashbord.category\list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=DB::table('categories')->where('status','1')->get();
        return view('ecommerce\backend\admin\dashbord\category\create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function category_manange_process(Request $req)
    {
        $req->validate([
            'category_name'  => 'required',
            'category_slug' =>'required|unique:categories'
        ]);
        // if ($image = $req->file('category_image')) {
        //     $destinationPath = 'category_images/';
        //     $category_image = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $category_image->name);
        //     $req['category_image'] = "$category_image";
        // }
$data=new Category();
     
      
       
      
        $data->category_name=$req->category_name;
        $data->category_slug=$req->category_slug;
        $data->parent_category_id=$req->parent_category_id;

        if($file = $req->hasFile('category_image')) {
            $file = $req->file('category_image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/category_images/' ;
            $file->move($destinationPath,$fileName);
            $data->category_image =$fileName ;
           
        }

        $data->save();
       return redirect('/category/list')->with('added','Category Has Been Inserted');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Category::find($id);
        $cat_parent_id=Category::all();
      
        return view('ecommerce.backend.admin.dashbord.category.edit',compact('data','cat_parent_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$id)
    {
       
// dd($req->all());

        $data=Category::find($id);
      
        $data->category_name=$req->category_name;
        $data->category_slug=$req->category_slug;
        $data->parent_category_id=$req->parent_category_id;

        if($file = $req->hasFile('category_image')) {
            $file = $req->file('category_image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/category_images/' ;
            $file->move($destinationPath,$fileName);
            $data->category_image =$fileName ;
           
        }

        $data->save();
        return redirect('/category/list')->with('updated','Category Has Been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table=DB::table('categories')->where('id','=',$id)->delete();
        return redirect('/category/list')->with('deleted','Category has been deleted');
    }
    public function status(Request $req,$status,$id){
        
        $data=Category::find($id);
        $data->status=$status;
        $data->save();
        return redirect('/category/list');
    }
}
