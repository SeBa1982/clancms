<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $memberRole = Role::where('name', 'member')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('password')
        ]);

        $member = User::create([
            'name'      => 'Member',
            'email'     => 'member@member.com',
            'password'  => Hash::make('password')
        ]);

        $user = User::create([
            'name'      => 'User',
            'email'     => 'user@user.com',
            'password'  => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $member->roles()->attach($memberRole);
        $user->roles()->attach($userRole);
    }
}
