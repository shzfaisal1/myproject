<?php

namespace App\Http\Controllers;
use App\Models\HomeBanner;
use Illuminate\Http\Request;

class HomeBannerController extends Controller
{
    

    function index(){
        
        $data=HomeBanner::all();
        return view('ecommerce.backend.admin.dashbord.homebanner.list',compact('data'));
    }

    function store(Request $req){

        $req->validate([
            'url' =>'required'
        ]);
        $data =new HomeBanner();
        if($req->file('image')){
            $file= $req->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/homebanner'), $filename);
            $data->image= $filename;
        }
        $data->url= $req->url;
        $data->text=$req->text;
        $data->save();

        return redirect('homebanner/list')->with('HomeAdded','home banner added');
    }


    function create(){
        return view('ecommerce.backend.admin.dashbord.homebanner.create');
    }


    function delete($id){
        HomeBanner::find($id)->delete();
        return redirect('homebanner/list')->with('del','homebanner has deleted');
    }

function edit($id){
    $data=HomeBanner::findorFail($id);
    return view('ecommerce.backend.admin.dashbord.homebanner.edit',compact('data'));
}
    

function update(Request $req,$id){

        $data=HomeBanner::findorFail($id);
        if($req->file('image')){
            $file= $req->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/homebanner'), $filename);
            $data->image= $filename;
        }
        $data->url= $req->url;
        $data->text=$req->text;
        $data->save();
        return redirect('homebanner/list')->with('edit','home banner update');

    }
}