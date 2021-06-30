<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Artikel;
use App\Author;
use App\Tag;
use App\Kategori;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
     public function __construct()
        {
            $this->middleware('auth');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = artikel::all();
        return view('artikel.index', compact('artikels'));
        $artikels = $authors->artikel;
        $artikels = $categorys->artikel;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = author::all();
        $categorys = kategori::all();
        $tags = tag::all();
        return view('artikel.create', compact('authors', 'categorys', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'article_title' => 'required',
            'article_content' => 'required',
            'article_img' => 'required|mimes:jpeg,png,jpg',
            'article_date' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required'
        ]);

        $gambar = $request->article_img;
        $name_img = time(). ' - '. $gambar->getClientOriginalName();

        $tags_arr = explode(',', $request["tags"]);
        $tags_ids = [];
        foreach($tags_arr as $tag_name)->first(){
            $tag = Tag::where("tag_name", $tag_name);
            if($tag){
                $tags_ids[] = $tag->id;
            }else{
                $new_tag = Tag::create(["tag_name" => $tag_name]);
                $tags_ids[] = $new_tag->id;
            }
        }

        artikel::create([
            'article_title' => $request->article_title,
            'article_content' => $request->article_content,
            'article_img' => $name_img,
            'article_date' => $request->article_date,
            'user_id' => Auth::id()
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'tag_id' => $request->tag_id
        ]);
        
        $artikels->tags()->sync($tags_ids);

        $gambar->move('images/img_article', $name_img);
        return redirect('/artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = artikel::findorfail($id);

        return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = artikel::findorfail($id);
        $author = author::all();
        $category = kategori::all();
        $tag = tag::all();
        return view('artikel.edit', compact('artikel', 'author', 'category', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'article_title' => 'required',
            'article_content' => 'required',
            'article_img' => 'required|mimes:jpeg,png,jpg',
            'article_date' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required'
        ]);

        $tags_arr = explode(',', $request["tags"]);
        $tags_ids = [];
        foreach($tags_arr as $tag_name)->first(){
            $tag = Tag::where("tag_name", $tag_name);
            if($tag){
                $tags_ids[] = $tag->id;
            }else{
                $new_tag = Tag::update(["tag_name" => $tag_name]);
                $tags_ids[] = $new_tag->id;
            }
        }

        $artikels->tags()->sync($tags_ids);

        $artikel = artikel::findorfail($id);

        if ($request->has('article_img')) {
            $path = "/posts";
            File::delete($path . $artikel->article_img);
            $gambar = $request->article_img;
            $new_gambar = time(). ' - '. $gambar->getClientOriginalName();
            $gambar->move('images/img_article/' . $new_gambar);
            $artikel_data = [
                'article_title' => $request->article_title,
                'article_content' => $request->article_content,
                'article_img' => $new_gambar,
                'article_date' => $request->article_date,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
                'tag_id' => $request->tag_id
            ];
        } else {
            $artikel_data = [
                'article_title' => $request->article_title,
                'article_content' => $request->article_content,
                'article_date' => $request->article_date,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
                'tag_id' => $request->tag_id
            ];
        }
        $artikel->update($artikel_data);

        return redirect('/artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = artikel::findorfail($id);
        $artikel->delete();

        $path = "images/img_article";
        file::delete($path . $artikel->article_img);

        return redirect('/artikel');

    }
}
