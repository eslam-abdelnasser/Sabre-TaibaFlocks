<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role ; 
use App\Permission ; 
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->get(); 
        return view('admin.roles.index',compact('roles')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
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
            'role_name'=>'required|unique:roles,name' , 
          
        ] ;
        $this->validate($request , $rules);

        $role = new Role ; 
        $role->name = $request->role_name ; 
        $role->display_name = $request->role_display_name ; 
        $role->description = $request->role_description ; 
        $role->save(); 

        session()->flash('message' , 'New Role has been added successfully'); 

        return redirect()->route('roles.index'); 


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
        $role = Role::find($id); 
        return view('admin.roles.edit',compact('role')); 
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
            'role_name'=>'required|unique:roles,name,'.$id ,
        ] ;
        $this->validate($request , $rules);

        $role = Role::find($id); 
        $role->name = $request->role_name ; 
        $role->display_name = $request->role_display_name ; 
        $role->description = $request->role_description ; 

        $role->save(); 

        session()->flash('message' , 'New Role has been updated successfully'); 

        return redirect()->route('roles.index'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
    }

    public function showPermissions($id){
        $role = Role::find($id) ; 
        return view('admin.roles.permissions' , compact('role')); 
    }

     public function addPermissions($id){
            $role = Role::find($id); 
            $permissions = Permission::all(); 
            return view ('admin.roles.add-permission' , compact('role', 'permissions')); 
        }

    public function storePermissions(Request $request , $id){
        
         
        


         $permissions = Permission::all(); 

             $isFirst = true;
          foreach ($request->all() as $key => $value) {
                if ($isFirst) {
                    $isFirst = false;
                    continue;
                }
            
              // echo "<pre>"; 
              // var_dump($key);

              $role = Role::find($id); 
              $permission = Permission::find($key); 
              $role->attachPermission($permission);
              // $role->perms()->sync(array($key)); 
              // $role->perms()->sync(array($createPost->id, $editUser->id));

          }
         
     

        // $permission = new Permission();
        // $permission->name         = $request->permission_name ; 
        // $permission->display_name = $request->permission_display_name ; 
        // $permission->description  = $request->permission_description ; 
        // $permission->save();

        // // get role then attach permission to it  
        // $role = Role::find($id); 
        // $role->attachPermission($permission);

        session()->flash('message' , 'Permission(s) attached successfully to this role'); 

        return redirect()->route("role.permissions" , $id);  
        
    }

    

    public function editPermission($role , $permission){

        $role = Role::find($role);
        $permission = Permission::find($permission); 
        return view('admin.roles.edit-permission' , compact('role' , 'permission'));  
    }

    public function updatePermission( Request $request ,  $role , $permission){
           $rules = [
            'permission_name'=>'required|unique:permissions,name,'.$permission , 
            
        ] ;
        $this->validate($request , $rules);

       $permission = Permission::find($permission); 

       $permission->name = $request->permission_name ; 
       $permission->display_name = $request->permission_display_name; 
       $permission->description = $request->permission_description ;

       $permission->save(); 

       session()->flash('message' , 'Permission updated successfully') ; 
       return redirect()->route("role.permissions" , $role );  


    }


}
