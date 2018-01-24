<?php

use Illuminate\Database\Seeder;
use App\Permission ; 
 use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
 use  Illuminate\Routing\Route ;
 
class ModulesSeeder extends Seeder
{
 
	public function boot()
	{
//	    $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	

    	//get a collection of routes  
        $routeCollection = Route::getRoutes();

        foreach($routeCollection->nameList as $route_name){
        	   $permission = new Permission ; 
        	   $permission->name = $route_name->getName(); 
        	   $permission->display_name = '' ; 
        	   $permission->description = '' ;
        	   $permission->save();  
        }; 
        
         

    }
}
