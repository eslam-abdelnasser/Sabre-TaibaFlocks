<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission ; 
class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all(); 
        return view('admin.permissions.index',compact('permissions')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create'); 
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
              'permission_name'=>'required|unique:permissions,name' , 
            ] ;
            $this->validate($request , $rules);

            $permission = new Permission ; 
            $permission->name = $request->permission_name ; 
            $permission->display_name = $request->permission_display_name ; 
            $permission->description = $request->permission_description ; 
            $permission->save(); 

            session()->flash('message' , 'New Permission has been added successfully'); 

            return redirect()->route('permissions.index'); 
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
        $permission = Permission::find($id); 
        return view('admin.permissions.edit',compact('permission')); 
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
              'permission_name'=>'required|unique:permissions,name,'.$id , 
            ] ;
            $this->validate($request , $rules);

            $permission =  Permission::find($id) ; 
            $permission->name = $request->permission_name ; 
            $permission->display_name = $request->permission_display_name ; 
            $permission->description = $request->permission_description ; 
            $permission->save(); 

            session()->flash('message' , 'Permission has been updated successfully'); 

            return redirect()->route('permissions.index'); 
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
