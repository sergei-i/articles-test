<?php

use App\Article;
use App\Tag;
use Illuminate\Database\Seeder;

class ArticleTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();

        Article::all()->each(function (Article $article) {

            $tags = Tag::inRandomOrder()
                ->take(random_int(1, Tag::all()->count()))
                ->get()
                ->pluck('id');

            $article->tags()->sync($tags);
        });
    }
}
