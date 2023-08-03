<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = DB::table('users')->pluck('id');

        foreach ($users as $userId) {
            $postCount = rand(1, 5); // You can adjust the number of blog posts per user

            for ($i = 0; $i < $postCount; $i++) {
                DB::table('blog_posts')->insert([
                    'title' => $faker->sentence,
                    'content' => $faker->paragraphs(3, true),
                    'cover' => "https://source.unsplash.com/random",
                    'user_id' => $userId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
