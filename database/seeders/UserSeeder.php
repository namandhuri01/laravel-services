<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        $adminRole = Role::where('name', 'admin')->first();
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@yopmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin->roles()->attach($adminRole);

        // Create regular user
        $userRole = Role::where('name', 'user')->first();
        $user = User::create([
            'name' => 'user',
            'email' => 'user@yopmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->roles()->attach($userRole);
        
    }
}
