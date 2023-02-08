<?php

namespace App\Http\Controllers;

use App\Models\Customer_list;
use Illuminate\Http\Request;

class CustomerListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_data=Customer_list::all();
        return view('ecommerce.backend.admin.dashbord.customer_list\list',compact('customer_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer_list  $customer_list
     * @return \Illuminate\Http\Response
     */
    public function show(Customer_list $customer_list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer_list  $customer_list
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer_list $customer_list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer_list  $customer_list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer_list $customer_list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer_list  $customer_list
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =Customer_list::findorFail($id);
        $data->delete();
        return redirect('customer/list')->with('deleted','customer has been deleted');
    }


    public function status($status,$id){
    $customer_status=Customer_list::find($id);
    $customer_status->status=$status;
    $customer_status->save();
    return redirect('customer/list');

    }
}
