<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++){
            $new_post = new POst();

            $new_post->title = $faker->sentence(rand(2,6));
            $new_post->content = $faker->text(rand(100,200));

            // slug generator
            $slug = Str::slug($new_post->title, '-');
            $slug_base = $slug;

            //verifica esistenza slug nel db

            $post_presente = Post::where('slug', $slug)->first();
            $contatore = 1;
            while($post_presente) {

                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $post_presente = Post::where('slug', $slug)->first();
            }

            //select * from posts where slug = $slug

            $new_post->slug = $slug;

            $new_post->user_id = 1;


            $new_post->save();
        }
    }
}
