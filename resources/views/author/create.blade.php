@extends('layouts.main')
@section('title','Create Author')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        Create Author
                    </div>
                    <div class="card-body">
                        <form class="row contact_form" action="/author" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <label for="">Nama</label><br>
                                <input type="text" class="form-control" id="author_name" name="author_name" />
                                @error('author_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Email</label><br>
                                <input type="email" class="form-control" id="author_email" name="author_email" />
                                @error('author_email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Password</label><br>
                                <input type="password" class="form-control" id="author_password" name="author_password" />
                                @error('author_password')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="">Bio</label><br>
                                <textarea name="bio" class="form-control" id="" cols="30" rows="10"></textarea>
                                @error('bio')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group ">
                                <label for="">Avatar</label><br>
                                <input type="file" class="form-control" id="author_ava" name="author_ava" />
                                @error('author_ava')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                             <div class="card-footer">
                                <button type="submit" class="btn_3">Submit</button>
                                <a href={{url('author')}} class="btn btn-dark">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
