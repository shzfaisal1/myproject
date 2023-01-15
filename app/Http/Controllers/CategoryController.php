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
        return view('ecommerce\backend\admin\dashbord\category\create');
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
        Category::create($req->all());
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
       
      
        return view('ecommerce.backend.admin.dashbord.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       


        $data=Category::find($id);
        $data->category_name=$request->category_name;
        $data->category_slug=$request->category_slug; 
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
