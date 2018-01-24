<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Contry;
use App\Models\City;
use App\Models\Group;
class UsersController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Contry::all();
        $cities = City::all();
        return view('admin.users.create', compact('countries', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ];
        $this->validate($request, $rules);

        $user = new User;
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = crypt($request->password, '');
        $user->country = $request->country;
        $user->city = $request->city;
        $user->street = $request->street;
        $user->mobile_number = $request->mobile_number;
        $user->points = $request->points;

        $user->save();

        session()->flash('message', 'New user has been added successfully');

        return redirect()->route('users.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $countries = Contry::all();
        $cities = City::all();
        return view('admin.users.edit', compact('user', 'countries', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request->all());

        $rules = [
            'username' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'password' => 'sometimes|confirmed'
        ];
        $this->validate($request, $rules);

        $user = User::find($id);
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if(!empty($request->password)){

            $user->password = crypt($request->password, '');
            
        }
        $user->country = $request->country;
        $user->city = $request->city;
        $user->street = $request->street;
        $user->mobile_number = $request->mobile_number;
        $user->points = $request->points;

        $user->save();


        session()->flash('message', ' user has been updated successfully');

        return redirect()->route('users.index');
    }

    public function getGroups($id)
    {
        $user = User::find($id);
        $groups = Group::all();
        return view('admin.users.attachGroup', compact('user', 'groups'));
    }

    public function postGroup(Request $request, $id)
    {
        $user = User::find($id);
        // $group = Group::find($request->group);
        $group_id = $request->group;

        $user->group()->attach($group_id);

        session()->flash('message', 'User has been assigned to this group successfully ');
        return redirect()->route('users.index');

    }
}
