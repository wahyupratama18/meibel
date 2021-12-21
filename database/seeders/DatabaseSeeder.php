<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = collect([
            (object) ['name' => 'Muhammad Taqi Syahid Abdullah', 'email' => 'taqi@gmail.com'],
            (object) ['name' => 'Nur Aisyah Oktavia', 'email' => 'nuraisyah@gmail.com'],
            (object) ['name' => 'Selvi Trianawati', 'email' => 'selviit@gmail.com'],
            (object) ['name' => 'Yulia Eka Putri Lestari', 'email' => 'yulia@gmail.com'],
        ]);
        
        User::upsert(
            $users->map(fn($item) => ['name' => $item->name, 'email' => $item->email, 'password' => Hash::make('password'), 'role' => 1])->toArray(),
            ['name', 'email'], ['name', 'email', 'password', 'role']
        );
        // \App\Models\User::factory(10)->create();
    }
}
