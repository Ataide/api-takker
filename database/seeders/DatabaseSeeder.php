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
        // $this->call([
        //     OfferSeeder::class,

        // ]);
        // \App\Models\User::factory(10)->create();

        $admin = \App\Models\User::where('email', '=', 'administrator@takker.com')->first();

        if (!$admin) {
            \App\Models\User::factory()->create([
                'name' => 'Administrator',
                'email' => 'administrator@takker.com',
                'password' => '$2y$10$PaHLeMKjF8hEq1gydiGRAOvqE8TWC6hj3pEY0YE1EVmShfneLkLNO', // $10$BDex11
            ]);
        }

        \App\Models\User::factory()->hasProfile(1)->hasAmzTokens(1)->hasFilters(1)->hasOffers(10)->create([
            'name' => 'Joao',
            'email' => 'joao@takker.com',
            'password' => '$2y$10$PaHLeMKjF8hEq1gydiGRAOvqE8TWC6hj3pEY0YE1EVmShfneLkLNO', // $10$BDex11
        ]);
    }
}
