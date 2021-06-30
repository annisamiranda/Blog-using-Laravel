@extends('layouts.main')
@section('title','List Article')
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
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                 @forelse ($artikels as $key=>$value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->article_title }}</td>
                                    <td>{{ $value->article_content }}</td>
                                    <td>
                                        <div class="media epost_item">
                                        <img src="{{asset('images/img_article/'.$value->article_img)}}" alt="post">
                                        </div>
                                    </td>
                                    <td>{{ $value->article_date }}</td>
                                    <td>{{ $value->author_id }}</td>
                                    <td>{{ $value->category_id }}</td>
                                    <td>{{ $value->tag_id }}</td>
                                    <td style="display:flex">
                                    <form action="/artikel/{{ $value->id }}" method="post">
                                        <a href="/artikel/{{ $value->id }}" class="genric-btn primary mr-2"> Show </a>
                                        <a href="/artikel/{{ $value->id }}/edit" class="genric-btn warning mr-2"> Edit </a>
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="genric-btn danger " value="Delete"/>
                                    </form>
                                    </td>
                                </tr>
                            @empty
                                <tr >
                                    <td colspan="6">No data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
