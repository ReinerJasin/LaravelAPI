<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Reiner (Admin)';
        $user->email = 'reiner1@gmail.com';
        $user->password = Hash::make("12345678");
        $user->role_id = '1'; #Web Admin
        $user->save();
        
        $user = new User();
        $user->name = 'Reiner (Creator)';
        $user->email = 'reiner2@gmail.com';
        $user->password = '$2y$10$gtdDqmd.lIX/MFe4wB6yue6RbhyzjzibIQwjcPQFi92RcWCFOvuEG'; //sama seperti hask make cuma ini ambil yang udah ter-hash dari phpmyadmin
        $user->role_id = '2'; #Event Creator
        $user->save();
        
        $user = new User();
        $user->name = 'Reiner (Guest)';
        $user->email = 'reiner3@gmail.com';
        $user->password = Hash::make("12345678");
        $user->role_id = '3'; #Normal User
        $user->save();
    }
}
