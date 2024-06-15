<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => 'Berita Pertama',
            'seotitle' => 'berita-pertama',
            'user_id' => 1,
            'content' => 'This is the content of post ',
            'image' => 'noimage.jpg',
            'hits' => 0,
            'active' => 'Yes',
            'status' => 'publish',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}