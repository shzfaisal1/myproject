<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data=size::all();
        return view('ecommerce\backend\admin\dashbord\size\list',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ecommerce\backend\admin\dashbord\size\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        size::create($request->all());
        return redirect('size/list')->with('add_size','Inserted Size');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=size::findorFail($id);
        return view('ecommerce\backend\admin\dashbord\size\edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data=size::find($id);
        $data->sizes=$request->sizes;
        $data->save();
        return redirect('size/list')->with('updated','size has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        size::findorFail($id)->delete();
        return redirect('size/list')->with('deleted','size has deleted');
    }

    public function status(Request $Req,$status,$id){

        $data=size::find($id);
        $data->status=$status;
        $data->save();

        return redirect('size/list');
    }
}
