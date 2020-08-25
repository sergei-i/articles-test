<?php

use App\Article;
use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Article::all();

        factory(Comment::class, 30)->make()->each(function ($comment) use ($articles) {
            $comment->article_id = $articles->random()->id;
            $comment->save();
        });
    }
}
