<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Author;
use App\Kategori;
use App\Tag;
use App\Users;

class BlogController extends Controller
{
    /**
     * Created safari.erie
     * Created_date 28 Mei 2021
     * Description :
     *              Show Blog, Show Detail Blog, Create Comment Blog
     */

     /**
      * Method Index startup list all blog
      */

       public function __construct()
        {
            $this->middleware('auth');
        }
      public function index()
      {
        $authors = author::all();
        $categorys = kategori::all();
        $tags = tag::all();
        $artikels = artikel::all();
        return view('blogs.index', compact('authors', 'categorys', 'tags', 'artikels'));
      }
}
