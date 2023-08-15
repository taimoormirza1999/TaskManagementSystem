<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create an admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@taskmanagementsystem.com',
            'password' => Hash::make(12345678), // Use Hash to securely hash the password
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->roles()->attach($adminRole);

        // // Create three regular users
        // $users = User::factory(3)->create();
        // $userRole = Role::where('name', 'user')->first();
        // foreach ($users as $user) {
        //     $user->roles()->attach($userRole);
        // }
    }
}
