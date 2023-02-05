<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create(['title'=>'demo','sub_title'=>'demo','description'=>'demo','slug'=>Str::slug('demo')]);
        Post::factory(20)->create();
    }
}
