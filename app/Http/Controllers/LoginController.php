<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logins;
use Hash;
use Session;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ecommerce.backend.admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login_check(Request $request)

    {

       
        $data=logins::where('email','=',$request->email)->first();
       
        if($data){
         if(Hash::check($request->password,$data->password)){
                session()->put('login_id',$data->id);
                return redirect('/admin/dashboard');
         }else{
            return redirect('/admin')->with('error2','password did not match');
         }
        }else{
            return redirect('/admin')->with('error1','invalid email');
        }
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
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('ecommerce\backend\admin\dashbord\index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(login $login)
    {
        //
    }
}
