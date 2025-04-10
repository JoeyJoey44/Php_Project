<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Summary;

class SummarySeeder extends Seeder
{
    public function run(): void
    {
        Summary::create([
            'user_id' => 1, // Adjust to an existing user ID
            'title' => 'Intro to AI',
            'summary_text' => 'This lecture discussed the basics of artificial intelligence including machine learning and deep learning.',
        ]);

        Summary::create([
            'user_id' => 1,
            'title' => 'Data Structures',
            'summary_text' => 'Covered arrays, linked lists, stacks, and queues with use cases.',
        ]);
    }
}

