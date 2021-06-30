<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use File;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = author::all();
        return view('author.index', compact('authors'));
        // return view('author.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
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
            'author_name' => 'required',
            'author_email' => 'required',
            'author_password' => 'required',
            'bio' => 'required',
            'author_ava' => 'required|mimes:jpeg,png,jpg',
        ]);

        $gambar = $request->author_ava;
        $name_img = time(). ' - '. $gambar->getClientOriginalName();

        author::create([
            'author_name' => $request->author_name,
            'author_email' => $request->author_email,
            'author_password' => $request->author_password,
            'bio' => $request->bio,
            'author_ava' => $name_img   
        ]);

        $gambar->move('images/post', $name_img);
        return redirect('/author');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = author::findorfail($id);
        return view('author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = author::findorfail($id);
        return view('author.edit', compact('author'));
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
            'author_name' => 'required',
            'author_email' => 'required',
            'author_password' => 'required',
            'bio' => 'required',
            'author_ava' => 'mimes:jpeg,png,jpg',
        ]);

        $author = author::findorfail($id);

        if ($request->has('author_ava')) {
            $path = "/posts";
            File::delete($path . $author->author_ava);
            $gambar = $request->author_ava;
            $new_gambar = time(). ' - '. $gambar->getClientOriginalName();
            $gambar->move('images/post/' . $new_gambar);
            $author_data = [
                'author_name' => $request->author_name,
                'author_email' => $request->author_email,
                'author_password' => $request->author_password,
                'bio' => $request->bio,
                'author_ava' => $new_gambar
            ];
        } else {
            $author_data = [
                'author_name' => $request->author_name,
                'author_email' => $request->author_email,
                'author_password' => $request->author_password,
                'bio' => $request->bio,
            ];
        }
        $author->update($author_data);

        return redirect('/author');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = author::findorfail($id);
        $author->delete();

        $path = "images/post";
        file::delete($path . $author->author_ava);

        return redirect('/author');

    }
}
