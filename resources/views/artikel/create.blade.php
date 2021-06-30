@extends('layouts.main')
@section('title','Create Article')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        Create Article
                    </div>
                    <div class="card-body">
                        <form class="row contact_form" action="/artikel" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <label for="">Title</label><br>
                                <input type="text" class="form-control" id="article_title" name="article_title" />
                                <span class="placeholder" data-placeholder="Article Title"></span>
                                @error('article_title')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Content</label><br>
                                <textarea name="article_content" class="form-control" id="" cols="30" rows="10"></textarea>
                                @error('article_content')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Gambar</label><br>
                                <input type="file" class="form-control" id="article_img" name="article_img" />
                                @error('article_img')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group ">
                                <label for="">Tanggal</label><br>
                                <input type="date" class="form-control" id="article_date" name="article_date" />
                                @error('article_date')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <label for="tag">Tags</label>
                                <input type="text" class="form-control" name="tag" id="tag" value=" {{old('tag', '')}}"/>
                                <span class="placeholder" data-placeholder="Pisahkan dengan Koma"></span>
                                @error('tag')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12 form-group ">
                                <label for="">Author</label><br>
                                <select name="author_id" id="" class="form-control">
                                    <option value="-"></option>
                                    @foreach ($authors as $value)
                                        <option value="{{ $value->id }}">{{ $value->author_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group ">
                                <label for="">Kategori</label><br>
                                <select name="category_id" id="" class="form-control">
                                    <option value="-"></option>
                                    @foreach ($categorys as $value)
                                        <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group ">
                                <label for="">Tag</label><br>
                                <select name="tag_id" id="" class="form-control">
                                    <option value="-"></option>
                                    @foreach ($tags as $value)
                                        <option value="{{ $value->id }}">{{ $value->tag_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="card-footer">
                                <button type="submit" class="btn_3">Submit</button>
                                <a href={{url('article')}} class="btn btn-dark">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
