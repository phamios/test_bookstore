<?php

namespace Database\Seeders;

use App\Models\Authors;
use App\Models\Authors_Books;
use App\Models\Books;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Schema::table('authors', function (Blueprint $table) {
        //     $table->index('name');
        // });
        // // Capture start time
        // $startTime = microtime(true);
        // // Disable foreign key constraints temporarily
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // // Read data from file
        // // $file_name = 'fake_authors.json';
        // // $file_name = 'fake_books.json';
        // $file_name = 'fake_book_author.json';
        // $jsonContent = file_get_contents($file_name);
        // if ($jsonContent === false) {
        //     // Handle file reading error
        //     die('Error reading authors.json file.');
        // }
        // // // Decode JSON content
        // $data = json_decode($jsonContent, true);
        // if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
        //     // Handle JSON decoding error
        //     die('Error decoding JSON from authors.json file: ' . json_last_error_msg());
        // }

        // // // Chunk the data for batch insertion
        // $chunks = array_chunk($data, 5000);

        // // // Insert data into database in batches
        // foreach ($chunks as $chunk) {
        //     // Authors::insert($chunk);
        //     // Books::insert($chunk);
        //     Authors_Books::insert($chunk);

        //     // Calculate elapsed time
        //     $elapsedTime = microtime(true) - $startTime;
        //     // Display seeding time
        //     $this->command->info("Seeding completed in {$elapsedTime} seconds.");
        // }
        // // Re-enable foreign key constraints
        // DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
