@extends('layouts.main')
@section('title','Create Category')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        Create Category
                    </div>
                    <div class="card-body">
                        <form class="row contact_form" action="/kategori" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <label for="">Nama Kategori</label><br>
                                <input type="text" class="form-control" id="category_name" name="category_name" />
                                @error('category_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                             <div class="card-footer">
                                <button type="submit" class="btn_3">Submit</button>
                                <a href={{url('kategori')}} class="btn btn-dark">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
