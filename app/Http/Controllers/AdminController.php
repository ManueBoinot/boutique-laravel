<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gamme;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
use App\Models\User;
>>>>>>> Tony

class AdminController extends Controller
{
   public function index(){

      $articles = Article::all();
      $gammes = Gamme::all();
<<<<<<< HEAD
      return view('admin.index',['articles' => $articles, 'gammes'=>$gammes]);
    
   }
}
=======
      $users = User::with('role')->get();
      return view('admin.index',['articles' => $articles, 'gammes'=>$gammes, 'users'=>$users]);
   }
      
}
>>>>>>> Tony
