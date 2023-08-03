<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostLike;
use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostLikesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $users = DB::table('users')->pluck('id');
        $blogPosts = DB::table('blog_posts')->pluck('id');

        foreach ($blogPosts as $postId) {
            $randomUsers = $users->random(rand(1, $users->count()));

            foreach ($randomUsers as $userId) {
                DB::table('post_likes')->insert([
                    'user_id' => $userId,
                    'blog_post_id' => $postId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
