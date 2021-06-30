@extends('layouts.main')
@section('title','Detail Article')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header py-3 bg-success">
                    <h3 class="m-0  text-primary mb-2">Daftar Artikel</h3>
                    <a href="{{url('artikel/create')}}" class="btn_2 btn-sm"><i class="fa fa-plus"></i> Tambah </a>
                </div>
                <div class="card-body">
                    <table id="artikel-table" class="table table-bordered table table-striped">
                        <thead>
                            <th>No</th>
                            <th>Article Title</th>
                            <th>Article Content</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Kategori</th>
                            <th>Tag</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $artikel->id }}</td>
                                <td>{{ $artikel->article_title }}</td>
                                <td>{{ $artikel->article_content }}</td>
                                <td>
                                    <div class="media epost_item">
                                    <img src="{{asset('images/img_article/'.$artikel->article_img)}}" alt="post">
                                    </div>
                                </td>
                                <td>{{ $artikel->article_date }}</td>
                                <td> Author : {{$artikel->author->author_name}} </td>
                                <td> Category : {{$artikel->category->category_name}} </td>
                                <td>{{ $artikel->author_id }}</td>
                                <td>{{ $artikel->category_id }}</td>
                                <td>{{ $artikel->tag_id }}</td>
                            </tr>
                            <div>
                                Tags :
                                @forelse ($artikel->tag as $tag)
                                    <button class="btn btn-primary btn-sm"> {{$tag->tag_name}} </button>

                                    @empty
                                    No Tags
                                @endforelse
                            </div>
                            <div>
                                <label for="comment">Comment</label>
                                <input type="text" class="form-control" name="comment" id="comment">
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
