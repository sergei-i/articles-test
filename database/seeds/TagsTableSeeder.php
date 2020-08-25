<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 5)->make()->each(function ($tag) {
            $tag->url = "/tags/$tag->title";
            $tag->save();
        });
    }
}
