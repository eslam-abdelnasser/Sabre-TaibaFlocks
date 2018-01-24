<?php

use Illuminate\Database\Seeder;
use App\Admin ; 
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin ; 
        $admin->name = "Emad Rashad"; 
        $admin->email = "admin@admin.com"; 
      
        $admin->password = crypt(123456,''); 
        $admin->remember_token = str_random(12); 
        $admin->save(); 
    }
}
