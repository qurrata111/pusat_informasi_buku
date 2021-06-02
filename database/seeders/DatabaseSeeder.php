<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Budi Badu',
        //     'email' => 'budibadu@laravel.com',
        //     'password' => Hash::make('password'),
        //     'remember_token' => '1234567890'
        // ]);
    }
}
