<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleLikeResource;

class ArticleLikeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Article $article
     * @return ArticleLikeResource
     */
    public function __invoke(Article $article)
    {
        $article->likes = ++$article->likes;
        $article->save();

        return new ArticleLikeResource($article);
    }
}
