<?php

namespace App\Http\Controllers;
use App\Models\jsonform;
use Illuminate\Http\Request;
use DB;
class JsonController extends Controller

{
    //

    public function index(){
        $data=DB::table('countries')->orderby('name','ASC')->get();
        return view('json.form',compact('data'));
    }

    public function store(Request $request){
        
        $data=new jsonform;
        $data->name= $request->name; 
        $data->email= $request->email;
        $data->number= $request->number;
        $data->country_id = $request->country;
        $data->state_id = $request->state;
        $data->city_id = $request->city;
        $data->save();

        return response()->json([
            'status' => 1
        ]);

    }

    public function fetech_state($country_id){

      
        $data=DB::table('states')->where('country_id','=',$country_id)->get();
        return response()->json([

            'status' => 1,
            'states' => $data
        ]);
      
    }


    public function fetch_city($state_id){
        $data=DB::table('cities')->where('state_id','=',$state_id)->get();
        return response()->json([
            'city' =>$data
        ]);
    }
}
