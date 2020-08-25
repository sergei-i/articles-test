<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleViewResource;

class ArticleViewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Article $article
     * @return ArticleViewResource
     */
    public function __invoke(Article $article)
    {
        $article->views = ++$article->views;
        $article->save();

        return new ArticleViewResource($article);
    }
}
