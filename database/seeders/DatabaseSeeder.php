<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\SummarySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optional: Wipe old data (useful for fresh starts)
        DB::table('summaries')->delete();
        DB::table('users')->delete();

        // Create a new test user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // add password
        ]);

        // Store user in the container for SummarySeeder
        $this->call(SummarySeeder::class);
    }
}
