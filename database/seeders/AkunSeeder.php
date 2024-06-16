<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User diimpor

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
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
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
