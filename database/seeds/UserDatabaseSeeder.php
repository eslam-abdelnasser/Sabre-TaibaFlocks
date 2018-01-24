<?php

use Illuminate\Database\Seeder;
use App\User; 

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User ; 
        $user->username = "user"; 
        $user->first_name = 'emad';
        $user->last_name = 'rashad';
        $user->email = 'user@user.com';
        $user->password = crypt(123456,'');
        $user->remember_token = str_random(12);
        $user->user_type = 0 ;
        $user->save(); 
       
    }
}
