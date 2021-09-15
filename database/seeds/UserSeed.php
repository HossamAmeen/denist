<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'=> 'master admin',
            'email' => 'masteradmin@asd.asd',
            'password' => bcrypt('admin'),
            'user_name' => "master_admin",
            'phone' => "01010079798",
            'user_id' => "1",
            'role' => 10,
        ]);
        \App\Models\User::create([
            'name'=> 'super admin',
            'email' => 'superadmin@asd.asd',
            'password' => bcrypt('admin'),
            'user_name' => "super_admin",
            'phone' => "01010079798",
            'user_id' => "1",
            'role' => 9,
        ]);
        \App\Models\User::create([
            'name'=> 'admin',
            'email' => 'admin@asd.asd',
            'password' => bcrypt('admin'),
            'user_name' => "admin",
            'phone' => "01010079798",
            'user_id' => "1",
            'role' => 1,
        ]);
    }
}
