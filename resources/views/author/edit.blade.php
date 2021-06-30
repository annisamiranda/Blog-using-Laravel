@extends('layouts.main')
@section('title','Edit Author')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        Edit Author
                    </div>
                    <div class="card-body">
                        <form class="row contact_form" action="/author/{{ $author->id }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12 form-group p_star">
                                <label for="">Nama</label><br>
                                <input type="text" class="form-control" id="author_name" name="author_name" value="{{ $author->author_name }}"/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Title</label><br>
                                <input type="text" class="form-control" id="author_email" name="author_email" value="{{ $author->author_email }}"/>
                                <span class="placeholder" data-placeholder="Author Email"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="author_password" name="author_password" value="{{ $author->author_password }}"/>
                                <span class="placeholder" data-placeholder="Author Password"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <textarea name="author_bio" class="form-control" id="" cols="30" rows="10">{{ $author->bio }}</textarea>
                            <span class="placeholder" data-placeholder="Author Bio"></span>
                            </div>
                            <div class="col-md-12 form-group ">
                                <input type="file" class="form-control" id="author_ava" name="author_ava" />
                            </div>
                             <div class="card-footer">
                                <button type="submit" class="btn_3">Edit</button>
                                <a href={{url('author')}} class="btn btn-dark">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
