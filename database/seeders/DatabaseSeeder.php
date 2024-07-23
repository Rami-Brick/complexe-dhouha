<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Event;
use App\Models\Objective;
use App\Models\Post;
use App\Models\Relative;
use App\Models\Staff;
use App\Models\Student;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Student::factory(5)->create();
        Comment::factory(5)->create();
        Objective::factory(5)->create();
        Event::factory(5)->create();
        Bill::factory(5)->create();
    }
}
