<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

          \App\Models\Role::create([
            'name' => 'Admin',
        ]);
        \App\Models\Role::create([
            'name' => 'User',
        ]);

        \App\Models\User::create([
            'name' => 'James Mbugua',
            'username' => 'james',
            'email' => 'kamirijames11@gmail.com',
            'role_id'=>1,
            'password' => Hash::make('manage.py'),
        ]);




    }
}
