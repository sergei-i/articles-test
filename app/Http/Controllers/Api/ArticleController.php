<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleShowResource;
use App\Http\Resources\ArticleIndexResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticleIndexResource::collection(Article::paginate(10));
    }

    public function showLatest($quantity = 6)
    {
        return ArticleIndexResource::collection(Article::take($quantity)->get());
    }

    public function show(Article $article)
    {
        return new ArticleShowResource($article);
    }
}
