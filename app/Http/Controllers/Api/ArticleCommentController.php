<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param CommentStoreRequest $request
     * @param Article $article
     * @return CommentResource
     */
    public function __invoke(Article $article, CommentStoreRequest $request)
    {
        $comment = Comment::make($request->all());
        $comment->article()->associate($article)->save();

        return new CommentResource($comment);
    }
}
