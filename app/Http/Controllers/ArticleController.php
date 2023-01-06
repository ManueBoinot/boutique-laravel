<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('article', [
            'article' => $article
        ]);

    }
    
    

}
