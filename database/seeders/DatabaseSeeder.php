<?php

namespace Database\Seeders;

use App\Models\Kasir;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'fullname' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@ex.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        $kasir = User::create([
            'fullname' => 'Kasir',
            'username' => 'kasir',
            'email' => 'kasir@ex.com',
            'password' => bcrypt('kasir'),
            'role' => 'kasir',
        ]);

        Kasir::create([
            'user_id' => $kasir->id
        ]);
    }
}
