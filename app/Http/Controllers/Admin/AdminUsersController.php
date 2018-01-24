<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin ; 
use App\Role ; 
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::latest()->get(); 
        return view('admin.admins.index',compact('admins')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all(); 
        return view('admin.admins.create', compact('roles')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|unique:admins,name' ,  
            'email'=>'required|unique:admins,email' ,  
            'password'=>'required',
            'password_confirmation'=>'required|same:password'
        ] ;
        $this->validate($request , $rules);

        $admin = new Admin  ; 
        $admin->name = $request->name ; 
        $admin->email = $request->email ; 
        $admin->password = crypt($request->password , ''); 

        $admin->save(); 

        // next step is to attach role to this admin :
        if(!empty($request->role)){
                $admin->attachRole($request->role); 
        }
       
        session()->flash('message' , 'New Backend user has been added successfully') ; 
        return redirect()->route('admin-users.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id); 
        $roles = Role::all();
        return view('admin.admins.edit', compact('admin','roles')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name'=>'required|unique:admins,name,'.$id ,  
            'email'=>'required|unique:admins,email,'.$id ,  
            'password'=>'sometimes|confirmed'
        ] ;
        $this->validate($request , $rules);

        $admin =  Admin::find($id)  ; 
        $admin->name = $request->name ; 
        $admin->email = $request->email ; 
         if(!empty($request->password)){

            $admin->password = crypt($request->password , ''); 
            
         }

        $admin->save(); 

        // next step is to attach role to this admin :
        if(!empty($request->role)){
                $admin->roles()->sync(['role_id'=>$request->role]) ; 
        }
       
        session()->flash('message' , ' Backend user has been successfully updated') ; 
        return redirect()->route('admin-users.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
