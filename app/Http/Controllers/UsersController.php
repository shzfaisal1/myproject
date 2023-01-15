<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usersdata;
class UsersController extends Controller
{
    

    public function index(){

        $data=Usersdata::all();
        return view('admin.Users',compact('data'));
    }


    public function create(){
        return view('admin.UsersAdd');
    }
    public function store(Request $request){
        $request->validate([

            'name' => 'required', 
            'email' => 'required',
            'number' => 'required|digits:10',
        
        ]);
        Usersdata::create($request->all());  
        return redirect('/users/list')->with('succesfull','user inserted');
    }
        public function edit($id){

            $data=Usersdata::find($id);
            return view('admin.users_edit',compact('data'));
        }
    public function destroy($id){
        $data=Usersdata::find($id)->delete();
        return redirect('/users/list')->with('destroy','deleted successfully');
        
    }
    public function update(Request $request,$id){

              $data=Usersdata::find($id);
              $data->name=$request->name;
              $data->email=$request->email; 
              $data->number=$request->number;
              $data->save();

              return redirect('/users/list')->with('update','updated sucessfully');
    }
}
