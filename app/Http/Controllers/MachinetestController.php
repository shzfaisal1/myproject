<?php

namespace App\Http\Controllers;

use App\Models\machinetest;
use Illuminate\Http\Request;

use DB;
class MachinetestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=DB::table('countries')->orderby('id','ASC')->get();
        return view('machinetest.form',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function fetch_state($c_id)
    {
        $state=DB::table('states')->where('country_id','=',$c_id)->get();
        return response()->json([
            'status' => 1,
        
            'state' => $state
        ]);

    }

    public function fetch_city($state_id){
            $city=DB::table('cities')->where('state_id',$state_id)->get();

            return response()->json([
                'cities' =>$city
            ]);


    }
    public function store(Request $request)
    {
        machinetest::create($request->post());
        return redirect('/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\machinetest  $machinetest
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=DB::table('machine_test as m')
        ->select('m.name','m.email', 'c.name as Cname', 'states.name as Sname','cities.name as SCname')
        ->join('countries as c','c.id','=','m.country_id')
        ->join('states','states.id','=','m.state_id')
        ->join('cities','cities.id','=','m.city_id')
        ->get();

        // $data=DB::table('machine_test as m')
        // ->select('m.*', 'countries.name as Cname')
        // ->leftjoin('countries', 'm.country_id', 'countries.id')
        // ->get();

        echo"<pre>";
        print_r($data);
        die;
        return view('machinetest.list',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\machinetest  $machinetest
     * @return \Illuminate\Http\Response
     */
    public function edit(machinetest $machinetest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\machinetest  $machinetest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, machinetest $machinetest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\machinetest  $machinetest
     * @return \Illuminate\Http\Response
     */
    public function destroy(machinetest $machinetest)
    {
        //
    }
}
