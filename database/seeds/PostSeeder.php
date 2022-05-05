<?php

use App\Category;
use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $categories = Category::all();

        $categoriesId = $categories->pluck('id')->all();

        for ($i = 0; $i < 50; $i++) {

            $post = new Post();
            $post->title = $faker->words(8, true);
            $post->slug = Str::slug($post->title);
            $post->category_id = $faker->optional()->randomElement($categoriesId);
            $post->content = $faker->paragraph(5, true);
            $post->image = $faker->url();
            $post->published_at = $faker->optional()->dateTime();
            $post->save();
        }
    }
}
