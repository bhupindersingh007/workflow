<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // users data

        User::create([
            'id' => 1,
            'first_name' => 'Bhupinder',
            'last_name' => 'Singh',
            'email' => 'bhupinder@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), 
        ]);

        User::create([
            'id' => 2,
            'first_name' => 'Lakshit',
            'last_name' => 'Gajendra',
            'email' => 'lakshit@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), 
        ]);


        User::create([
            'id' => 3,
            'first_name' => 'Amulya',
            'last_name' => 'Mehta',
            'email' => 'amulya@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 4,
            'first_name' => 'Kandarp',
            'last_name' => 'Patel',
            'email' => 'kandarp@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), 
        ]);



        // projects data

        Project::create([
            'title' => '#P30 - Website Redesign',
            'slug' => 'website-redesign',
            'description' => 'Redesigning the company website to improve user experience and add new features.',
            'created_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Project::create([
                'title' => '#P54 - Marketing Campaign',
                'slug' => 'marketing-campaign',
                'description' => 'Planning and executing a marketing campaign for the launch of a new product.',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);


        Project::create([
            'title' => '#42 - Mobile App Development',
            'slug' => 'mobile-app-development',
            'description' => 'Developing a mobile application for both iOS and Android platforms.',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // tasks data

        Task::create(['title' => 'Define Goals and Objectives', 'project_id' => 1]);
        Task::create(['title' => 'Research Competitors\' Websites', 'project_id' => 1]);
        Task::create(['title' => 'Create Wireframes for New Layout', 'project_id' => 1]);
        Task::create(['title' => 'Design Mockups for Homepage', 'project_id' => 1]);
        Task::create(['title' => 'Gather Feedback from Stakeholders', 'project_id' => 1]);



    }
}
