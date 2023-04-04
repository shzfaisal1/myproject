<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Illuminate\Http\Request;
use DB;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=coupon::all();
        return view('ecommerce\backend\admin\dashbord\coupan\list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $values=coupon::all();
        return view('ecommerce\backend\admin\dashbord\coupan\create',compact('values'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'Title'  => 'required',
            'Code' =>'required|unique:coupons',
            'Title'  => 'required',
            'value'  => 'required',
        ]);
        coupon::create($request->all());


        return redirect('coupon/list')->with('add','coupon has been inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=coupon::findorFail($id);
        return view('ecommerce\backend\admin\dashbord\coupan\edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data=coupon::find($id);
        $data->Title= $request->Title;
        $data->Code= $request->Code;
        $data->value= $request->value;
        $data->type= $request->type;
        $data->min_order_amt= $request->min_order_amt;
        $data->is_one_time= $request->is_one_time;

        $data->save();

        return redirect('coupon/list')->with('updated','Coupon has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $data=coupon::findorFail($id)->delete();
    return redirect('coupon/list')->with('delete','Coupon has been deleted');
    }

    public function status(Request $request,$status,$id){
        $data=coupon::find($id);
        $data->status=$status;
        $data->save();
        return redirect('coupon/list');
    }
}
