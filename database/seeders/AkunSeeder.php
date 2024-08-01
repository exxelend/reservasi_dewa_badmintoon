<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User diimpor
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB ::table('users')->insert(  [
            [
                'name'      => 'admin',
                'email'     => 'admin@gmail.com',
                'role'      => 'admin',
                'password'  => bcrypt('12345678'),
            ],
            [
                'name'      => 'user',
                'email'     => 'user@gmail.com',
                'role'      => 'user',
                'password'  => bcrypt('12345678'),
            ],
            [
                'name'      => 'owner',
                'email'     => 'owner@gmail.com',
                'role'      => 'owner',
                'password'  => bcrypt('12345678'),
            ],
            [
                'name'      => 'petugas',
                'email'     => 'petugas@gmail.com',
                'role'      => 'petugas',
                'password'  => bcrypt('12345678'),
            ],
            [
                'name'      => 'kasir',
                'email'     => 'kasir@gmail.com',
                'role'      => 'kasir',
                'password'  => bcrypt('12345678'),
            ],
        ]);

    //     foreach ($users as $user) {
    //         User::create($user);
    //     }
    // }
    // foreach ($users as $user) {
    //     $existingUser = User::where('email', $user['email'])->first();
    //     if (!$existingUser) {
    //         User::create($user);
    //     }
        
    }
}
    
