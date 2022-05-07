<?php

use App\User;
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
        // admin user
        User::create([
            'name' => 'Stefano Mancuso',
            'email' => 'stefanomancuso13@gmail.com',
            'password' => Hash::make('prova123'),
        ]);
        // admin user
        User::create([
            'name' => 'Ezio Gregio',
            'email' => 'eziog@gmail.com',
            'password' => Hash::make('ezio'),
        ]);
    }
}
