<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        \App\Models\User::factory(10)->create();
//        \App\Models\Listing::factory(50)->create();

         \App\Models\User::factory()->create([
             'name' => 'moh',
             'email' => 'moh@example.com',
             'is_admin' => true
         ]);
        \App\Models\User::factory()->create([
            'name' => 'mhmd',
            'email' => 'mhmd@example.com',
        ]);

        \App\Models\Listing::factory(10)->create([
           'user_id' => 1
        ]);
        \App\Models\Listing::factory(10)->create([
            'user_id' => 2
        ]);
    }
}
