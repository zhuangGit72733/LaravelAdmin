<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {


        return ArticleResource::collection(Article::all());
    }

}
