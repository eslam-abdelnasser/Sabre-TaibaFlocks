<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Role;
use Illuminate\Validation\Rule;
use App\Permission;
use Illuminate\Support\Facades\Route;
class DashboardController extends Controller
{
    //

    public function index()
    {

//        $role =  Role::find(3);
//        $role->name         = 'agency agent';
//        $role->display_name = 'agent'; // optional
//        $role->description  = 'Agent is allowed to manage and edit other users and manage tickets'; // optional
//        $role->save();
//        $admin = Admin::find(1);
//        $routeCollection = Route::getRoutes();
//        foreach ($routeCollection as $value) {
//            echo $value->getPath() .'<br>';
//        }
//        dd($routeCollection);
//        $admin->roles()->attach($role->id);

//        $createPost = new Permission();
//        $createPost->name         = 'create-post';
//        $createPost->display_name = 'Create Posts'; // optional
// Allow a user to...
//        $createPost->description  = 'create new blog posts'; // optional
//        $createPost->save();
//        $role->attachPermission($createPost);
//
//        $result = $admin->can('create-post');
//
//        dd($result);
        return view('admin.index');
    }
}
