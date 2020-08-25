<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 20)->create();

        Article::all()->each(function (Article $article) {
            $article->updated_at = $article->created_at->addDays(random_int(1, 60));
            $article->save();
        });
    }
}
