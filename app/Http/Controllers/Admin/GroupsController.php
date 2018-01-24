<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Group  ; 

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all(); 
        return view('admin.groups.index',compact('groups')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.groups.create'); 
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
            'group_name'=>'required'
        ]; 
        $this->validate($request , $rules); 

        $group = new Group ; 
        $group->name = $request->group_name ; 
        $group->save(); 

        session()->flash('message' , 'New Group has been added successfully'); 
        return redirect()->route('groups.index'); 
    }

   public function groupUsers($id){
        // get the group 
        $group = Group::find($id);

        $users = $group->user ; 
        return view('admin.groups.users' , compact('users' , 'group') ); 

   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $group = Group::find($id);
         return view('admin.groups.edit',compact('group')); 
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
            'group_name'=>'required'
        ]; 
        $this->validate($request , $rules); 

        $group = Group::find($id) ; 
        $group->name = $request->group_name ; 
        $group->save(); 

        session()->flash('message' , 'Group has been updated successfully'); 
        return redirect()->route('groups.index'); 
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
    //
}
