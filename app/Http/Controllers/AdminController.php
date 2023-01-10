<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gamme;
use Illuminate\Http\Request;
use App\Models\Campagne;

class AdminController extends Controller
{

    public function __construct() // restriction d'accès via middleware
    {
        return $this->middleware('admin'); //équivalent d'une fonction IF
    }

    // _____________________________________________________________________________________

    public function index()
    {

        $articles = Article::get();
        $gammes = Gamme::get();
        $campagnes = Campagne::get();
        return view('admin.index', ['articles' => $articles, 'gammes' => $gammes, 'campagnes' => $campagnes]);
    }
}
